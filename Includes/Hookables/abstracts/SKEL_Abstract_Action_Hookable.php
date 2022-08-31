<?php

declare(strict_types=1);

namespace SKEL\includes\hookables\abstracts;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;

abstract class SKEL_Abstract_Action_Hookable implements SKEL_I_Hookable_Component
{
    protected string $hook;
    protected string $callback;
    protected int $priority;
    protected int $accepted_args;

    /**
     * @param string $hook WP Hook to hook onto
     * @param string $callback name of the method that will be called
     * @param integer $priority execution priority of this component
     * @param integer $accepted_args amount of arguments this method's callback accepts
     */
    public function __construct(string $hook, string $callback, int $priority = 10, $accepted_args = 1)
    {
        $this->hook = $hook;
        $this->callback = $callback;
        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
    }

    final public function register(): void
    {
        \add_action(
            $this->hook,
            array($this, $this->callback),
            $this->priority,
            $this->accepted_args
        );
    }
}
