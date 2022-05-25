<?php

declare(strict_types=1);

namespace SKEL\Includes\Loaders;

use SKEL\Includes\RestAPI\Endpoints\SKEL_I_Endpoint;
use SKEL\Includes\Loaders\SKEL_Action_Loader;
use SKEL\Includes\Loaders\SKEL_Filter_Loader;
use SKEL\Includes\Loaders\SKEL_Shortcode_Loader;

class SKEL_Plugin_Loader
{
    /**

     * @var SKEL_I_Loader[]
     */
    private array $loaders;
    /**
     * Undocumented variable
     *
     * @var SKEL_Endpoint_Loader[]
     */
    private array $endpoints;

    public function __construct()
    {
        $this->loaders = array();
        $this->endpoints = array();

        $this->add_action("rest_api_init", $this, "register_endpoints_to_wp");
    }

    /**
     * add regular action to loader
     *
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param integer $priority
     * @param integer $accepted_args
     * @return void
     */
    public function add_action(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->loaders[] = new SKEL_Action_Loader($hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * Add Ajax action to loader. Method automatically adds 'wp_ajax_' prefix to hook name. For logged-in users
     *
     * @param string $hook 
     * @param object $component
     * @param string $callback
     * @param integer $priority
     * @param integer $accepted_args
     * @return void
     */
    public function add_ajax_action(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->loaders[] = new SKEL_Action_Loader("wp_ajax_{$hook}", $component, $callback, $priority, $accepted_args);
    }

    /**
     * Add Ajax action to loader. Method automatically adds 'wp_ajax_nopriv' prefix to hook name. For non-logged-in users.
     *
     * @param string $hook 
     * @param object $component
     * @param string $callback
     * @param integer $priority
     * @param integer $accepted_args
     * @return void
     */
    public function add_ajax_nopriv_action(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->loaders[] = new SKEL_Action_Loader("wp_ajax_nopriv_{$hook}", $component, $callback, $priority, $accepted_args);
    }

    /**
     * Add admin post action to loader. method automatically ads 'admin_post' prefix to hook name.
     *
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param integer $priority
     * @param integer $accepted_args
     * @return void
     */
    public function add_admin_post_action(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->loaders[] = new SKEL_Action_Loader("admin_post_{$hook}", $component, $callback, $priority, $accepted_args);
    }

    /**
     * Add admin post action to loader. method automatically ads 'admin_post' prefix to hook name. for non-logged-in users.
     *
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param integer $priority
     * @param integer $accepted_args
     * @return void
     */
    public function add_admin_post_nopriv_action(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->loaders[] = new SKEL_Action_Loader("admin_post_nopriv_{$hook}", $component, $callback, $priority, $accepted_args);
    }

    /**
     * add filter to loader
     *
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param integer $priority
     * @param integer $accepted_args
     * @return void
     */
    public function add_filter(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->loaders[] = new SKEL_Filter_Loader($hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * add shortcode to loader
     *
     * @param string $tag
     * @param object $component
     * @param string $callback
     * @return void
     */
    public function add_shortcode(string $tag, object $component, string $callback): void
    {
        $this->loaders[] = new SKEL_Shortcode_Loader($tag, $component, $callback);
    }

    /**
     * add Endpoint 
     *
     * @param string $namespace namespace of the API
     * @param SKEL_I_Endpoint $endpoint 
     * @return void
     */
    public function add_API_Endpoint(string $namespace, SKEL_I_Endpoint $endpoint): void
    {
        $this->endpoints[] = new SKEL_Endpoint_Loader($namespace, $endpoint);
    }

    /**
     * callback function to register all hooks.
     *
     * @return void
     */
    final public function register_hooks_to_wp(): void
    {
        foreach ($this->loaders as $loader) {
            $loader->register();
        }

        $this->loaders = array();
    }

    /**
     * callback function to register all API Endpoints
     *
     * @return void
     */
    final public function register_endpoints_to_wp(): void
    {
        foreach ($this->endpoints as $loader) {
            $loader->register();
        }

        $this->endpoints = array();
    }
}
