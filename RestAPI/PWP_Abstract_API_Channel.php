<?php

declare(strict_types=1);

namespace SKEL\includes\RestAPI;

use SKEL\includes\loaders\SKEL_Plugin_Loader;
use SKEL\includes\RestAPI\Endpoints\SKEL_I_Endpoint;
use SKEL\includes\hookables\SKEL_I_Hookable_Component;

/**
 * abstract class for the handling and registering of API Endpoints.
 */
class SKEL_Abstract_API_Channel implements SKEL_I_Hookable_Component
{
    protected SKEL_Channel_Definition $definition;
    protected array $endpoints;

    public function __construct(string $namespace, string $title, string $rest_base)
    {
        $this->definition = new SKEL_Channel_Definition($namespace, $title, $rest_base);
    }

    final protected function add_endpoint(SKEL_I_Endpoint $endpoint): void
    {
        $this->endpoints[] = $endpoint;
    }

    final public function register_hooks(SKEL_Plugin_Loader $loader): void
    {
        foreach ($this->endpoints as $endpoint) {
            $loader->add_API_Endpoint($this->definition->get_namespace(), $endpoint);
        }
    }

    final public function get_definition(): SKEL_Channel_Definition
    {
        return $this->definition;
    }
}