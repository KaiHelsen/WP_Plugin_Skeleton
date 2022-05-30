<?php

declare(strict_types=1);

namespace SKEL\Includes\Loaders;

interface SKEL_I_Loader
{
    /**
     * wrapper function for registering wordpress hooks
     *
     * @return void
     */
    public function register(): void;
}
