<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

use SKEL\includes\hookables\SKEL_I_Hookable_Component;

/**
 * abstract atomic class for wordpress actions
 */
abstract class SKEL_Abstract_Action_Hookable implements SKEL_I_Hookable_Component
{
    /***
     * @var Hook[]
     */
    protected array $hooks;
    protected string $callback;
    protected int $priority;
    protected int $accepted_args;

    /**
     * 
     * abstract atomic class for wordpress actions
     * @param string $hook WP Hook to hook onto
     * @param string $callback name of the method that will be called
     * @param integer $priority execution priority of this component
     * @param integer $accepted_args amount of arguments this method's callback accepts
     */
    public function __construct(string $hook, string $callback, int $priority = 10, $accepted_args = 1)
    {
        $this->hooks[] = new Hook($hook, $priority);
        $this->callback = $callback;
        $this->accepted_args = $accepted_args;
    }

    final public function register(): void
    {
        foreach($this->hook as $hook){
        \add_action(
            $hook->hook,
            array($this, $this->callback),
            $hook->priority,
            $this->accepted_args
        );
    }
    }

    final public function add_hook(string $hook, int $priority): void{
        $this->hooks[] = new Hook($hook, $priority);
    }
}
