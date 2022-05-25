<?php

declare(strict_types=1);

namespace SKEL\Includes;

use SKEL\Includes\Hookables\SKEL_I_Hookable_Component;
use SKEL\Includes\Hookables\SKEL_Hookable_Parent_Trait;
use SKEL\Includes\Loaders\SKEL_Loader;

if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

defined('ABSPATH') || exit;

class SKEL_Plugin implements SKEL_I_Hookable_Component
{
    use SKEL_Hookable_Parent_Trait;

    private SKEL_Loader $loader;
    private string $version;
    private string $plugin_name;

    private function __construct()
    {
        $this->version = defined('SKEL_VERSION') ? SKEL_VERSION : '1.0.0';
        $this->plugin_name = 'SKELETON';
        $this->loader = new SKEL_Loader();

        if (is_admin()) {

            /*  ADD ADMIN MENU HOOKABLES HERE */
            /*  These are hookables that are only required in the admin panel of wordpress. Loading them every time a call is done to wordpress is a waste of resources.*/
            /*  Storing them here is thus an easy way to save a little bit on performance */
        }

        /*  ADD PUBLIC HOOKABLES HERE */

        /* REGISTER CHILD HOOKS WITH LOADER */
        $this->register_hooks($this->loader);
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
}
