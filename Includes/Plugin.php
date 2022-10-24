<?php

declare(strict_types=1);

namespace SKEL\includes;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;
use SKEL\includes\hookables\SKEL_Abstract_Branch;
use SKEL\includes\loadables\SKEL_Loader;
use SKEL\includes\restAPI\SKEL_I_Endpoint;

if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

defined('ABSPATH') || exit;

class SKEL_Plugin
{
    private SKEL_Loader $loader;
    private string $version;
    private string $plugin_name;

    private function __construct()
    {
        $this->version = defined('SKEL_VERSION') ? SKEL_VERSION : '1.0.0';
        $this->plugin_name = 'SKELETON';
        $this->loader = new SKEL_Loader();

        if (is_admin()) {
            $this->admin_hooks();
        }
        $this->public_hooks();
        $this->api_endpoints();
    }

    private function admin_hooks(): void
    {
        /** ADD ADMIN ONLY HOOKABLES */
        
        //ie. $this->register_hookable(new my_hookable_class());
    }

    private function public_hooks(): void
    {
        /** ADD PUBLIC HOOKABLES */
    }

    private function api_endpoints(): void
    {
        /** ADD API HOOKABLES & API PLUGIN COMPONENTS */
    }

    final public static function run()
    {
        $instance = new SKEL_Plugin();
        $instance->register_components();
        do_action('SKEL_plugin_loaded');
    }

    private function register_components()
    {
        $this->loader->register_hooks_to_wp();
    }

    private function register_hookable(SKEL_I_Hookable_Component $hookable): void
    {
        $this->loader->add_hookable($hookable);
    }

    private function register_API_Endpoint(SKEL_I_Endpoint $hookable): void
    {
        $this->loader->add_API_endpoint($hookable);
    }
}
