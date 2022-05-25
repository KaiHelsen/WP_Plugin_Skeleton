<?php

declare(strict_types=1);

namespace SKEL\Includes\RestAPI;

use SKEL\includes\Hookables\SKEL_Hookable_Branch_Trait;
use SKEL\includes\hookables\SKEL_I_Hookable_Component;

/**
 * overarching class which contains and handles the creation/registering of API Channels
 */
class SKEL_API_Plugin implements SKEL_I_Hookable_Component
{
    use SKEL_Hookable_Branch_Trait;

    private string $namespace;

    public function __construct(string $namespace)
    {
        $this->namespace = $namespace;
        /* ADD API ENDPOINT & CHANNEL HOOKABLES */
    }

}
