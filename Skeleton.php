<?php

declare(strict_types=1);

namespace SKEL;

require plugin_dir_path(__FILE__) . '/vendor/autoload.php';

use SKEL\Includes\SKEL_Activator;
use SKEL\Includes\SKEL_Deactivator;
use SKEL\Includes\SKEL_Plugin;

/**
 * @link              N/A
 * @since             0.1.0
 * @package           SKEL
 *
 * @wordpress-plugin
 * Plugin Name:       Skeleton
 * Plugin URI:        https://github.com/KaiHelsen/WP_Plugin_Skeleton
 * requires PHP:      7.4
 * requires at least: 5.9.0
 * Description:       In-development wordpress plugin skeleton for OOP development
 * Version:           0.1.0
 * Author:            Kai Helsen
 * Author URI:        https://github.com/KaiHelsen
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       SKELETON
 * Domain Path:       /languages
 */

defined('WPINC') || die;

/**
 * Define SKEL constants for use throughout the plugin
 */
define('SKEL_VERSION', '0.1.0');
!defined('SKEL_OPTION_GROUP') ? define('SKEL_OPTION_GROUP', 'SKEL_OPTIONS') : null;
!defined('SKEL_TEXT_DOMAIN') ? define('SKEL_TEXT_DOMAIN', 'SKEL') : null;

//register activation component. Is called when the plugin is activated
register_activation_hook(__FILE__, function () {
    $activator = new SKEL_Activator();
    $activator->activate();
});

//register deactivation component. Is called when the plugin is deactivated
register_deactivation_hook(__FILE__, function () {
    $deactivator = new SKEL_Deactivator();
    $deactivator->deactivate();
});

SKEL_Plugin::run();
