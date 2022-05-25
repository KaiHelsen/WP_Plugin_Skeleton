<?php

declare(strict_types=1);

namespace SKEL\Includes\Hookables;

use SKEL\Includes\Hookables\SKEL_I_Hookable_Component;
use SKEL\Includes\Loaders\SKEL_Loader;

abstract class SKEL_Abstract_Shortcode_Component implements SKEL_I_Hookable_Component
{
    protected string $tag;

    protected const CALLBACK = 'shortcode_callback';

    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    final public function register_hooks(SKEL_Loader $loader): void
    {
        $loader->add_shortcode(
            $this->tag,
            $this,
            SELF::CALLBACK,
        );
    }

    public abstract function shortcode_callback(...$args): void;
}
