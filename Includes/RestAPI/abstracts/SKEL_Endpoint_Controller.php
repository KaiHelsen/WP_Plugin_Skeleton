<?php

declare(strict_types=1);

namespace SKEL\includes\restAPI\abstracts;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;
use SKEL\includes\restAPI\SKEL_I_Endpoint;

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

    public function get_arguments(): array
    {
        return [];
    }

    final public function register(): void
    {
        register_rest_route(
            $this->namespace,
            $this->get_path(),
            array(
                'args' => $this->get_arguments(),
                'callback' => $this->get_callback(),
                'methods' => $this->get_methods(),
                'permission_callback' => $this->get_permission_callback(),
            )
        );
    }

    public abstract function do_action(\WP_REST_Request $request): \WP_REST_Response;
    public abstract function authenticate(\WP_REST_Request $request): bool;
}
