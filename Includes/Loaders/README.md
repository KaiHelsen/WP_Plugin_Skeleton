# Loaders
## About
The loaders directory contains a handful of classes that help with the loading and registering of Wordpress Hooks.

___
### SKEL_Loader.php

The central loader class that can do all the heavy lifting when it comes to registering hooks in wordpress. It functions as a wrapper class and factory for `SKEL_I_Loader` implementations.

the class has a series of default functions to register hooks, which I recommend you use to register hooks, rather than calling the native wordpress method directly:
* `add_action()`
* `add_filter()`
* `add_shortcode()`
* `add_ajax_action()`
* `add_ajax_nopriv_action()`
* `add_admin_post_action()`
* `add_admin_post_nopriv_action()`
* `add_API_endpoint()`

All non-API registered hooks are registered by the plugin when the plugin is loaded. An extra hook is automatically loaded to register the API hooks when the `rest_api_init` hooks is called.

Certain WP hooks require a specific prefix to work, such as `wp_ajax_`. the `add_ajax_action()` and `add_ajax_nopriv_action()` methods will automatically add appropriate prefix to the hook.

`register_hooks_to_wp()` will register all registered `action`, `filter` and `shortcode` hooks to wordpress.

`register_endpoints_to_wp()` will register all endpoints to wordpress.

I recommend **Registering a hook in the same class or file where it's callback method is located.** this has the benefit of being able to quickly go to the implementation, and not having to worry too much about navigating a complex directory structure.
