# WP_Plugin_Skeleton
A skeleton for an OOP wordpress plugin. Based on the architecture and logic of the [Wordpress Plugin Boilerplate](https://github.com/devinvinson/WordPress-Plugin-Boilerplate/), but remade and adapted to suit my personal preferences and sensibilities.

## usage
1. Find-Replace all instances of `SKELETON` with `my plugin name`, excluding filenames. All these uses will be in strings or comments, so they should be safe.
2. Find-Replace all instance of `SKEL` with the `plugin_slug` of your plugin, including file names. the slug is also the namespace of the plugin skeleton, and will be used for PSR-4 autoloading.
3. rename `Skeleton.php` to `My-Plugin-Name.php`
