<?php

declare(strict_types=1);

namespace SKEL\Includes\Loaders;

use SKEL\Includes\RestAPI\Endpoints\SKEL_I_Endpoint;

class SKEL_Endpoint_Loader implements SKEL_I_Loader
{
    private string $namespace;
    private SKEL_I_Endpoint $endpoint;
    
    public function __construct(string $namespace, SKEL_I_Endpoint $endpoint)
    {
        $this->namespace = $namespace;
        $this->endpoint = $endpoint;
    }
    final public function register()
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
