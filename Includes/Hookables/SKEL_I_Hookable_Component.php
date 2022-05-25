<?php

declare(strict_types=1);

namespace SKEL\Includes\Hookables;

use SKEL\Includes\Loaders\SKEL_Plugin_Loader;

/**
 * interface for objects to register hooks, actions and filters.
 */
interface SKEL_I_Hookable_Component
{
    /**
     * register actions and filters for this class
     */
    public function register_hooks(SKEL_Plugin_Loader $loader) : void;
}