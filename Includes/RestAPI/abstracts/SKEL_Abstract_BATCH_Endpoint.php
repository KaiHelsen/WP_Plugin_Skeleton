<?php

declare(strict_types=1);

namespace SKEL\includes\restAPI\abstracts;

use SKEL\includes\restAPI\abstracts\SKEL_Endpoint_Controller;

/**
 * abstract endpoint class for BATCH requests
 * allow a user to upload an array of data, and CREATE/UPDATE/DELETE multiple items in one call
 */
abstract class SKEL_Abstract_BATCH_Endpoint extends SKEL_Endpoint_Controller
{
    final public function get_methods(): string
    {
        return \WP_REST_Server::EDITABLE;
    }
}
