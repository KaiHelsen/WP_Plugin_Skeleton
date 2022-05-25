# WP_Plugin_Skeleton
A skeleton for an OOP wordpress plugin. Based on the architecture and logic of the [Wordpress Plugin Boilerplate](https://github.com/devinvinson/WordPress-Plugin-Boilerplate/), but remade and adapted to suit my personal preferences and sensibilities.

The general intent is to keep the code strict, and as such every .php file in the project will start with 

```PHP 
declare(strict_types=1);
```
I recommend being consistent in using strict types throughout the full project.

## usage
0. If downloaded, rename the `WP_Plugin_Skeleton` folder to your plugin name; in this example `my_plugin_name`.
1. Find-Replace all instances of `SKELETON` with `my plugin name`, excluding filenames. All these uses will be in strings or comments, so they should be safe.
2. Find-Replace all instance of `SKEL` with the `plugin_slug` of your plugin, including file names. the slug is also the namespace of the plugin skeleton, and will be used for PSR-4 autoloading.
3. rename `Skeleton.php` to `My-Plugin-Name.php`
4. edit the File Header in `My-Plugin-Name.php` with your details and plugin details.
