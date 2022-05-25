<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit82c15224a68744d072f0fd8b93217449
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SKEL\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SKEL\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'SKEL\\Includes\\Hookables\\SKEL_Abstract_Action_Component' => __DIR__ . '/../..' . '/Includes/Hookables/SKEL_Abstract_Action_Component.php',
        'SKEL\\Includes\\Hookables\\SKEL_Abstract_Ajax_Component' => __DIR__ . '/../..' . '/Includes/Hookables/SKEL_Abstract_Ajax_Component.php',
        'SKEL\\Includes\\Hookables\\SKEL_Abstract_Filter_Component' => __DIR__ . '/../..' . '/Includes/Hookables/SKEL_Abstract_Filter_Component.php',
        'SKEL\\Includes\\Hookables\\SKEL_Abstract_Shortcode_Component' => __DIR__ . '/../..' . '/Includes/Hookables/SKEL_Abstract_Shortcode_Component.php',
        'SKEL\\Includes\\Hookables\\SKEL_I_Hookable_Component' => __DIR__ . '/../..' . '/Includes/Hookables/SKEL_I_Hookable_Component.php',
        'SKEL\\Includes\\Loaders\\SKEL_Action_Loader' => __DIR__ . '/../..' . '/Includes/Loaders/SKEL_Action_Loader.php',
        'SKEL\\Includes\\Loaders\\SKEL_Endpoint_Loader' => __DIR__ . '/../..' . '/Includes/Loaders/SKEL_Endpoint_Loader.php',
        'SKEL\\Includes\\Loaders\\SKEL_Filter_Loader' => __DIR__ . '/../..' . '/Includes/Loaders/SKEL_Filter_Loader.php',
        'SKEL\\Includes\\Loaders\\SKEL_ILoader' => __DIR__ . '/../..' . '/Includes/Loaders/SKEL_ILoader.php',
        'SKEL\\Includes\\Loaders\\SKEL_Plugin_Loader' => __DIR__ . '/../..' . '/Includes/Loaders/SKEL_Plugin_Loader.php',
        'SKEL\\Includes\\Loaders\\SKEL_Shortcode_Loader' => __DIR__ . '/../..' . '/Includes/Loaders/SKEL_Shortcode_Loader.php',
        'SKEL\\Includes\\SKEL_Activator' => __DIR__ . '/../..' . '/Includes/SKEL_Activator.php',
        'SKEL\\Includes\\SKEL_Deactivator' => __DIR__ . '/../..' . '/Includes/SKEL_Deactivator.php',
        'SKEL\\Includes\\SKEL_Plugin' => __DIR__ . '/../..' . '/Includes/SKEL_Plugin.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit82c15224a68744d072f0fd8b93217449::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit82c15224a68744d072f0fd8b93217449::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit82c15224a68744d072f0fd8b93217449::$classMap;

        }, null, ClassLoader::class);
    }
}
