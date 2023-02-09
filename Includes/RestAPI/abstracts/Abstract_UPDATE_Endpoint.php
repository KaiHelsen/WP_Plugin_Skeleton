<?php

declare(strict_types=1);

namespace SKEL\includes\restAPI\abstracts;

use SKEL\includes\restAPI\abstracts\Abstract_Endpoint_Controller;

/**
 * abstract endpoint class for PUT/PATCH requests
 * 
 */
abstract class Abstract_UPDATE_Endpoint extends Abstract_Endpoint_Controller
{
    final public function get_methods(): string
    {
        return 'PUT, PATCH';
    }
}
