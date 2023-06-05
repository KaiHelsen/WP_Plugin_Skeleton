<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

/**
 * Abstract observer class for implementing WP action hooks in an OOP fashion. 
 */
abstract class Abstract_Action_Hookable extends Abstract_Hookable
{
    final public function register(): void
    {
        foreach ($this->hooks as $hook => $priority) {
            \add_action(
                $hook,
                array($this, $this->callback),
                $priority,
                $this->accepted_args
            );
        }
    }

    final public function deregister(): void
    {
        foreach ($this->hooks as $hook => $priority) {
            remove_action(
                $hook,
                array($this, $this->callback),
                $priority
            );
        }
    }
}
