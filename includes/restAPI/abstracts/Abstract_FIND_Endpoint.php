<?php

declare(strict_types=1);

namespace SKEL\includes\restAPI\abstracts;

use SKEL\includes\restAPI\abstracts\Abstract_Endpoint_Controller;

/**
 * abstract endpoint class for GET requests WITHOUT a required parameter
 * will try to retrieve a singular result
 */
abstract class Abstract_FIND_Endpoint extends Abstract_Endpoint_Controller
{
    final public function get_methods(): string
    {
        return \WP_REST_Server::READABLE;
    }
}
