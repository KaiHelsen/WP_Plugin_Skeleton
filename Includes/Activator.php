<?php

declare(strict_types=1);

namespace SKEL\includes;

defined('ABSPATH') || exit;

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
/**
 * activator class for the Peleman Product API plugin
 * is to be run when the plugin is activated from the Wordpress admin menu
 */
class SKEL_Activator
{
    public function activate()
    {
        $this->init_settings();
    }

    public function init_settings()
    {
        register_setting(SKEL_OPTION_GROUP, 'SKEL-version', array(
            'default' => '0.0.1',
        ));
    }
}
