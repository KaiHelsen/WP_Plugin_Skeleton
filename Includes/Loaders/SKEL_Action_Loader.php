<?php

declare(strict_types=1);

namespace SKEL\Includes\Loaders;

/**
 * wrapper class for Wordpress action hooks
 */
final class SKEL_Action_Loader implements SKEL_I_Loader
{
    private string $name;
    private object $component;
    private string $callback;
    private int $priority;
    private int $accepted_args;

    public function __construct(string $name, object $component, string $callback, int $priority = 1, int $accepted_args = 1)
    {
        $this->name = $name;
        $this->component = $component;
        $this->callback = $callback;
        $this->priority = $priority;
        $this->accepted_args = $accepted_args;
    }

    final public function register() : void
    {
        \add_action(
            $this->name,
            array($this->component, $this->callback),
            $this->priority,
            $this->accepted_args
        );
    }
}
