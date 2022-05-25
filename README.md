# WP_Plugin_Skeleton
## About
A skeleton for an OOP wordpress plugin. Based on the architecture and logic of the [Wordpress Plugin Boilerplate](https://github.com/devinvinson/WordPress-Plugin-Boilerplate/), but remade and adapted to suit my personal preferences and sensibilities.

The general intent is to use strict typing throughout the project, and as such every .php file in the project will start with 

```PHP 
declare(strict_types=1);
```
I recommend being consistent in using strict types throughout the full project.
___
## Usage
0. If downloaded, rename the `WP_Plugin_Skeleton` folder to your plugin name; in this example `my_plugin_name`.
1. Find-Replace all instances of `SKELETON` with `my plugin name`, excluding filenames. All these uses will be in strings or comments, so they should be safe.
2. Find-Replace all instance of `SKEL` with the `plugin_slug` of your plugin, including file names. the slug is also the namespace of the plugin skeleton, and will be used for PSR-4 autoloading.
3. rename `Skeleton.php` to `My-Plugin-Name.php`
4. edit the File Header in `My-Plugin-Name.php` with your details and plugin details.

## Includes
Additional functionality can be placed in one of three locations:
* `Includes` for functionality that is shared between Public and Admin
* `Admin` for admin functionality, primarily the admin panel
* `Public` for public functionality, public pages, etc.

For further implementation details, see the READMEs in the subfolders of the skeleton.
