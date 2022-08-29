<?php

declare(strict_types=1);

namespace SKEL\includes\loadables;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;

/**
 * wrapper class for Wordpress shortcodes
 */
final class SKEL_Shortcode_Loadable implements SKEL_I_Hookable_Component
{
    private string $tag;
    private object $component;
    private string $callback;

    public function __construct(string $tag, object $component, string $callback)
    {
        $this->tag = $tag;
        $this->component = $component;
        $this->callback = $callback;
    }

    final public function register(): void
    {
        \add_shortcode(
            $this->tag,
            array($this->component, $this->callback)
        );
    }
}
