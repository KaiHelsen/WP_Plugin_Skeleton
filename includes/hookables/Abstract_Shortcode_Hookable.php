<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

use SKEL\includes\hookables\I_Hookable_Component;

/**
 * Atomic class for registering shortcodes
 */
abstract class Abstract_Shortcode_Hookable implements I_Hookable_Component
{
    protected string $tag;
    protected string $callback;

    /**
     * Abstract observer class for a WP shortcode
     *
     * @param string $tag shortcode tag
     * @param string $callback name of the method which the shortcode calls.
     */
    public function __construct(string $tag, string $callback)
    {
        $this->tag = $tag;
        $this->callback = $callback;
    }

    final public function register(): void
    {
        \add_shortcode($this->tag, array($this, $this->callback));
    }
}
