<?php

declare(strict_types=1);

namespace SKEL\Includes\Hookables;

use SKEL\Includes\Hookables\SKEL_I_Hookable_Component;
use SKEL\Includes\Loaders\SKEL_Loader;

abstract class SKEL_Abstract_Leaf_Filter implements SKEL_I_Hookable_Component
{
    protected string $hook;
    protected int $priority;
    protected int $accepted_args;
    protected const CALLBACK = 'filter_callback';

    public function __construct(string $hook, int $priority = 10, $accepted_args = 1)
    {
        $this->hook = $hook;
        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
    }

    final public function register_hooks(SKEL_Loader $loader): void
    {
        $loader->add_filter(
            $this->hook,
            $this,
            SELF::CALLBACK,
            $this->priority,
            $this->accepted_args
        );
    }

    public abstract function filter_callback(...$args);
}
