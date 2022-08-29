<?php

declare(strict_types=1);

namespace SKEL\includes\loadables;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;
use SKEL\includes\restAPI\SKEL_I_Endpoint;

class SKEL_Endpoint_Loadable implements SKEL_I_Hookable_Component
{
    private string $namespace;
    private SKEL_I_Endpoint $endpoint;
    
    public function __construct(string $namespace, SKEL_I_Endpoint $endpoint)
    {
        $this->namespace = $namespace;
        $this->endpoint = $endpoint;
    }
    final public function register(): void
    {
        register_rest_route(
            $this->namespace,
            $this->endpoint->get_path(),
            array(
                'args' => $this->endpoint->get_arguments(),
                'callback' => $this->endpoint->get_callback(),
                'methods' => $this->endpoint->get_methods(),
                'permission_callback' => $this->endpoint->get_permission_callback(),
            )
        );
    }
}
