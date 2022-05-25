<?php

declare(strict_types=1);

namespace SKEL\includes\RestAPI;

use SKEL\includes\authentication\SKEL_Authenticator;
use SKEL\includes\traits\SKEL_Hookable_Parent_Trait;
use SKEL\includes\hookables\SKEL_I_Hookable_Component;

use SKEL\includes\RestAPI\Endpoints\categories\SKEL_API_Categories_Channel;

/**
 * overarching class which contains and handles the creation/registering of API Channels
 */
class SKEL_API_Plugin implements SKEL_I_Hookable_Component
{
    use SKEL_Hookable_Parent_Trait;

    private string $namespace;

    public function __construct(string $namespace)
    {
        $this->namespace = $namespace;
        /* ADD API ENDPOINT & CHANNEL HOOKABLES */
    }
}
