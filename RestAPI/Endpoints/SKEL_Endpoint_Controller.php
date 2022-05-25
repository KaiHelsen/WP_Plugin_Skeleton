<?php

declare(strict_types=1);

namespace SKEL\Includes\RestAPI\Endpoints;

use SKEL\Includes\Hookables\SKEL_I_Hookable_Component;
use SKEL\Includes\Loaders\SKEL_Loader;

abstract class SKEL_Endpoint_Controller implements SKEL_I_Endpoint, SKEL_I_Hookable_Component
{
    protected string $namespace;
    protected string $path;
    protected string $title;

    protected string $object;

    public function __construct(string $namespace, string $path, string $title)
    {
        $this->namespace = $namespace;
        $this->path = $path;
        $this->title = $title;
    }

    final public function get_callback(): callable
    {
        return array($this, 'do_action');
    }

    public function get_permission_callback(): callable
    {
        return array($this, 'authenticate');
    }

    public function get_path(): string
    {
        return $this->path;
    }

    public function register_hooks(SKEL_Loader $loader): void
    {
        $loader->add_API_endpoint($this->namespace, $this);
    }

    public abstract function do_action(\WP_REST_Request $request): \WP_REST_Response;
    public abstract function authenticate(\WP_REST_Request $request): bool;
}
