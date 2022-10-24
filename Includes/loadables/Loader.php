<?php

declare(strict_types=1);

namespace SKEL\includes\loadables;

use SKEL\includes\hookables\abstracts\SKEL_I_Hookable_Component;
use SKEL\includes\restAPI\SKEL_I_Endpoint;

class SKEL_Loader
{
    /**

     * @var SKEL_I_Loader[]
     */
    private array $loadables;
    /**
     * Undocumented variable
     *
     * @var SKEL_Endpoint_Loader[]
     */
    private array $endpoints;

    public function __construct()
    {
        $this->loadables = array();
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
        $this->loadables[] = new SKEL_Action_Loadable($hook, $component, $callback, $priority, $accepted_args);
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
        $this->loadables[] = new SKEL_Action_Loadable("wp_ajax_{$hook}", $component, $callback, $priority, $accepted_args);
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
        $this->loadables[] = new SKEL_Action_Loadable("wp_ajax_nopriv_{$hook}", $component, $callback, $priority, $accepted_args);
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
        $this->loadables[] = new SKEL_Action_Loadable("admin_post_{$hook}", $component, $callback, $priority, $accepted_args);
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
        $this->loadables[] = new SKEL_Action_Loadable("admin_post_nopriv_{$hook}", $component, $callback, $priority, $accepted_args);
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
        $this->loadables[] = new SKEL_Filter_Loadable($hook, $component, $callback, $priority, $accepted_args);
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
        $this->loadables[] = new SKEL_Shortcode_Loadable($tag, $component, $callback);
    }

    public function add_hookable(SKEL_I_Hookable_Component $hookable)
    {
        $this->loadables[] = $hookable;
    }

    /**
     * add Endpoint 
     *
     * @param string $namespace namespace of the API
     * @param SKEL_I_Endpoint $endpoint 
     * @return void
     */
    public function add_API_endpoint(SKEL_I_Endpoint $endpoint): void
    {
        $this->endpoints[] = $endpoint;
    }

    /**
     * callback function to add all hooks.
     *
     * @return void
     */
    final public function register_hooks_to_wp(): void
    {
        foreach ($this->loadables as $loadable) {
            $loadable->register();
        }

        $this->loadables = array();
    }

    /**
     * callback function to register all API Endpoints
     *
     * @return void
     */
    final public function register_endpoints_to_wp(): void
    {
        foreach ($this->endpoints as $endpoint) {
            $endpoint->register();
        }

        $this->endpoints = array();
    }
}
