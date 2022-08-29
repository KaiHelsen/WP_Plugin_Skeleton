<?php

declare(strict_types=1);

namespace SKEL\includes\hookables\abstracts;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;
use SKEL\includes\loadables\SKEL_Plugin_Loader;

abstract class SKEL_Abstract_Filter_Hookable implements SKEL_I_Hookable_Component
{
    protected string $hook;
    protected string $callback;
    protected int $priority;
    protected int $accepted_args;

    public function __construct(string $hook, string $callback, int $priority = 10, $accepted_args = 1)
    {
        $this->hook = $hook;
        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
        $this->callback = $callback;
    }

    final public function register(): void
    {
        \add_filter(
            $this->hook,
            array($this, $this->callback),
            $this->priority,
            $this->accepted_args
        );
    }
}
