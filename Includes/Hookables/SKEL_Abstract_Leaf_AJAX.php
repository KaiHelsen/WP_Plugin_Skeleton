<?php

declare(strict_types=1);

namespace SKEL\Includes\Hookables;

use SKEL\Includes\Loaders\SKEL_Loader;
use SKEL\Includes\Hookables\SKEL_I_Hookable_Component;

abstract class SKEL_Abstract_Leaf_Ajax implements SKEL_I_Hookable_Component
{

    private string $nonceName;
    private string $scriptHandle;
    private string $objectName;
    private string $jsFilePath;

    private int $priority;
    private int $accepted_args;

    private const CALLBACK = 'callback';
    private const CALLBACK_NOPRIV = 'callback_nopriv';

    /**
     * Undocumented function
     *
     * @param string $nonceName name of the nonce for the Ajax call. Used for verifying a source and preventing replay attacks.
     * @param string $handle script handle to which data will be attached.
     * @param string $objectName name for the Javascript object that is to be passed directly.
     * @param string $jsFilePath path of the Javascript file relative to the component file location.
     * @param integer $priority when executing, the priority of this hook. default `10`
     * @param integer $accepted_args amount of arguments this hook accepts. default `1`
     */
    public function __construct(string $nonceName, string $handle, string $objectName, string $jsFilePath, int $priority = 10, int $accepted_args = 1)
    {
        $this->nonceName = $nonceName;
        $this->scriptHandle = $handle;
        $this->objectName = $objectName;
        $this->jsFilePath = $jsFilePath;

        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
    }

    final public function register_hooks(SKEL_Loader $loader): void
    {
        $loader->add_action('wp_enqueue_scripts', $this, 'enqueue_ajax', 8);

        $loader->add_ajax_action(
            $this->objectName,
            $this,
            self::CALLBACK,
            $this->priority,
            $this->accepted_args
        );

        $loader->add_ajax_nopriv_action(
            $this->objectName,
            $this,
            self::CALLBACK_NOPRIV,
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
                'nonceName' => wp_create_nonce($this->nonceName)
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
}
