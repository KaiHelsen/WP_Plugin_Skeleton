<?php

declare(strict_types=1);

namespace SKEL\Includes\Hookables;

use SKEL\Includes\Hookables\SKEL_I_Hookable_Component;
use SKEL\Includes\Loaders\SKEL_Plugin_Loader;

abstract class SKEL_Abstract_Action_Component implements SKEL_I_Hookable_Component
{
    protected string $hook;
    protected int $priority;
    protected int $accepted_args;
    protected const CALLBACK = 'action_callback';

    /**
     * @param string $hook WP Hook to hook onto
     * @param integer $priority execution priority of this component
     * @param integer $accepted_args amount of arguments this method's callback accepts
     */
    public function __construct(string $hook, int $priority = 10, $accepted_args = 1)
    {
        $this->hook = $hook;
        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
    }

    final public function register_hooks(SKEL_Plugin_Loader $loader): void
    {
        $loader->add_action(
            $this->hook,
            $this,
            SELF::CALLBACK,
            $this->priority,
            $this->accepted_args
        );
    }

    public abstract function action_callback(...$args): void;
}
