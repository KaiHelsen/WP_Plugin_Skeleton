<?php

declare(strict_types=1);

namespace SKEL\Includes\Hookables;

use SKEL\Includes\hookables\SKEL_I_Hookable_Component;
use SKEL\Includes\Loaders\SKEL_Loader;

trait SKEL_Hookable_Branch_Trait
{
    /**
     * array of SKEL_I_Hookable_Component objects
     *
     * @var SKEL_I_Hookable_Component[]
     */
    public array $hookables;

    public function __construct()
    {
        $this->hookables = array();
    }

    public function add_hookable(SKEL_I_Hookable_Component $hookable): void
    {
        $this->hookables[] = $hookable;
    }

    public function remove_child_hookable(SKEL_I_Hookable_Component $hookable): void
    {
        unset($this->hookables[$hookable]);
    }

    public function register_hooks(SKEL_Loader $loader): void
    {
        foreach ($this->hookables as $hookable) {
            $hookable->register_hooks($loader);
        }
    }
}
