<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

use SKEL\includes\hookables\SKEL_I_Hookable_Component;

abstract class SKEL_Abstract_Filter_Hookable implements SKEL_I_Hookable_Component
{
    /**
     * @var Hook[]
     */
    protected array $hooks;
    protected string $callback;
    protected int $priority;
    protected int $accepted_args;

    public function __construct(string $hook, string $callback, int $priority = 10, $accepted_args = 1)
    {
        $this->hook[] = new Hook($hook, $priority);
        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
        $this->callback = $callback;
    }

    final public function register(): void
    {
        foreach ($this->hook as $hook) {
            \add_filter(
                $hook->hook,
                array($this, $this->callback),
                $hook->priority,
                $this->accepted_args
            );
        }
    }

    final public function add_hook(string $hook, int $priority): void
    {
        $this->hooks[] = new Hook($hook, $priority);
    }
}
