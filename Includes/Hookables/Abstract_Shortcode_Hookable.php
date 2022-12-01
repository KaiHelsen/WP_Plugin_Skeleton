<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

use SKEL\includes\hookables\SKEL_I_Hookable_Component;

/**
 * Atomic class for registering shortcodes
 */
abstract class SKEL_Abstract_Shortcode_Hookable implements SKEL_I_Hookable_Component
{
    protected string $tag;

    protected const CALLBACK = 'shortcode_callback';

    /**
     * Atomic class for registering shortcodes
     *
     * @param string $tag shortcode tag
     */
    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    final public function register(): void
    {
        add_shortcode($this->tag, array($this, self::CALLBACK));
    }

    final public function deregister(): void
    {
        remove_shortcode($this->tag);
    }

    /**
     * Abstract shortcode callback method
     *
     * @param [type] ...$args
     * @return void
     */
    public abstract function shortcode_callback(...$args): void;
}
