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
___
## Naming
For the most part, this skeleton follows [Wordpress Naming Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/#naming-conventions), with a few exceptions.

### Class names
The wordpress standard state that class file names should be prepended by `class-`, written in lowercase with hyphens separating words. ie `class-wp-error.php`.

However, this naming convention is not PSR-4 compliant. We want the filename to be the same as the class name, so we can easily use Composer's autoloading functionality.

**A class name should be prepended by the `plugin_slug`, separated by underscores, with each word capitalized. Abbreviated terms such as API can be fully capitalized.
the file name of the class should be the same as the class name.**
> `SKEL_My_Class`
> 
> `SKEL_My_API_Component`

**Interfaces** should be named by following the `plugin_slug` with `I`.

> `SKEL_I_Contract` 

**Abstract classes** should be named by following the `plugin_slug` with `Abstract`.
> `Abstract_Class` 

**Traits** should have names ending in `Trait`.
> `SKEL_My_Name_Trait`
