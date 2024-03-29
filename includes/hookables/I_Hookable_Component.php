<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

/**
 * interface for objects to register hooks, actions and filters.
 */
interface I_Hookable_Component
{
    /**
     * register actions and filters for this class
     */
    public function register(): void;
    /**
     * deregister hookable
     */
    public function deregister(): void;
}
