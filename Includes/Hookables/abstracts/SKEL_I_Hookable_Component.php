<?php

declare(strict_types=1);

namespace SKEL\includes\hookables\abstracts;
/**
 * interface for objects to register hooks, actions and filters.
 */
interface SKEL_I_Hookable_Component
{
    /**
     * register actions and filters for this class
     */
    public function register(): void;
}
