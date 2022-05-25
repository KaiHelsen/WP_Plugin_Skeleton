<?php

declare(strict_types=1);

namespace SKEL\Includes\RestAPI;

interface SKEL_I_Endpoint
{

    /**
     * get expected parameters for REST API endpoint
     *
     * @return array
     */
    public function get_arguments(): array;
    /**
     * get the callback used by the REST API endpoint
     *
     * @return callable
     */
    public function get_callback(): callable;
    /**
     * gt the callback used to validate a request to the REST API endpoint
     *
     * @return callable
     */
    public function get_permission_callback(): callable;
    /**
     * get the HTTP methods that the REST API endpoint responds to
     *
     * @return string
     */
    public function get_methods(): string;
    /**
     * return path of the REST API endpoint
     *
     * @return string
     */
    public function get_path(): string;
}
