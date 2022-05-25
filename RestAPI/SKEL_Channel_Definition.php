<?php

declare(strict_types=1);

namespace SKEL\Includes\RestAPI;

class SKEL_Channel_Definition
{
    private string $namespace;
    private string $title;
    private string $route;

    public function __construct(string $namespace, string $title, string $route)
    {
        $this->namespace = $namespace;
        $this->title = $title;
        $this->route = $route;
    }

    public function get_namespace(): string
    {
        return $this->namespace;
    }
    public function get_title(): string
    {
        return $this->title;
    }
    public function get_route(): string
    {
        return $this->route;
    }
}
