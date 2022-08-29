<?php

declare(strict_types=1);

namespace SKEL\includes\hookables\abstracts;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;
use SKEL\includes\loaders\SKEL_Plugin_Loader;

abstract class SKEL_Abstract_Shortcode_Hookable implements SKEL_I_Hookable_Component
{
    protected string $tag;

    protected const CALLBACK = 'shortcode_callback';

    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    final public function register(): void
    {
        \add_shortcode($this->tag, array($this, self::CALLBACK));
    }

    public abstract function shortcode_callback(...$args): void;
}
