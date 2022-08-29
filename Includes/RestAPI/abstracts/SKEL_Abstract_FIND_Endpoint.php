<?php

declare(strict_types=1);

namespace SKEL\includes\restAPI\abstracts;

use SKEL\includes\restAPI\abstracts\SKEL_Endpoint_Controller;

/**
 * abstract endpoint class for GET requests WITHOUT a required parameter
 * will try to retrieve a singular result
 */
abstract class SKEL_Abstract_FIND_Endpoint extends SKEL_Endpoint_Controller
{
    final public function get_methods(): string
    {
        return \WP_REST_Server::READABLE;
    }
}
