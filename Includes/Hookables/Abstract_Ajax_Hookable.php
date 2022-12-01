<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

use SKEL\includes\hookables\SKEL_I_Hookable_Component;

abstract class SKEL_Abstract_Ajax_Hookable implements SKEL_I_Hookable_Component
{

    protected string $nonceName;
    private string $scriptHandle;
    protected string $objectName;
    private string $jsFilePath;

    private int $priority;
    private int $accepted_args;

    private const CALLBACK = 'callback';
    private const CALLBACK_NOPRIV = 'callback_nopriv';

    /**
     * Undocumented function
     *
     * @param string $handle script handle to which data will be attached.
     * @param string $jsFilePath path of the Javascript file relative to the component file location.
     * @param integer $priority when executing, the priority of this hook. default `10`
     * @param integer $accepted_args amount of arguments this hook accepts. default `1`
     */
    public function __construct(string $handle,  string $jsFilePath, int $priority = 10, int $accepted_args = 1)
    {
        $this->scriptHandle = $handle;
        $this->objectName = $handle . '_object';
        $this->nonceName = $handle . '_nonce';
        $this->jsFilePath = $jsFilePath;

        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
    }

    final public function register(): void
    {
        \add_action(
            'wp_enqueue_scripts',
            array(
                $this,
                'enqueue_ajax'
            ),
        );
        \add_action(
            "wp_ajax_{$this->scriptHandle}",
            array(
                $this,
                self::CALLBACK
            ),
            $this->priority,
            $this->accepted_args
        );
        \add_action(
            "wp_ajax_nopriv_{$this->scriptHandle}",
            array(
                $this,
                self::CALLBACK_NOPRIV
            ),
            $this->priority,
            $this->accepted_args
        );
    }

    final public function enqueue_ajax(): void
    {
        wp_enqueue_script(
            $this->scriptHandle,
            $this->jsFilePath,
            array('jquery'),
            rand(0, 2000),
            true
        );
        wp_localize_script(
            $this->scriptHandle,
            $this->objectName,
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce($this->nonceName)
            )
        );
    }

    /**
     * functionality of the component for authenticated users
     *
     * @return void
     */
    public abstract function callback(): void;

    /**
     * functionality of the component for unauthenticated users
     *
     * @return void
     */
    public abstract function callback_nopriv(): void;

    /**
     * wrapper method to handle nonce validation. returns 0 if nonce is invalid, 1 or 2 if valid.
     * @param string $nonce
     * @return bool
     */
    protected function verify_nonce(string $nonce): bool
    {
        $value = wp_verify_nonce($nonce, $this->nonceName);
        return $value !== 0;
    }
}
