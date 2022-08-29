<?php

declare(strict_types=1);

namespace SKEL\includes\restAPI\abstracts;

use SKEL\includes\restAPI\abstracts\SKEL_Endpoint_Controller;

/**
 * abstract endpoint class for GET requests without a parameter
 * will try to find all items that match the request GET parameters
 */
abstract class SKEL_Abstract_READ_Endpoint extends SKEL_Endpoint_Controller
{
    final public function get_methods(): string
    {
        return \WP_REST_Server::READABLE;
    }
}
