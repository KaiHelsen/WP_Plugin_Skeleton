<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

abstract class Abstract_Batch_Hookables implements I_Hookable_Component
{
    /**
     * Array of child hookables
     * @var I_Hookable_Component[]
     */
    protected array $hookables = [];

    final protected function add_hookable(I_Hookable_Component $hookable): void
    {
        $this->hookables[] = $hookable;
    }
    
    final public function register(): void
    {
        foreach ($this->hookables as $hookable) {
            $hookable->register();
        }
    }

    final public function deregister(): void
    {
        foreach ($this->hookables as $hookable) {
            $hookable->deregister();
        }
    }
}
