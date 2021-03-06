<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b4a7c6f025d985c24c2fd336c084e86
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dattrink\\Adminlte3\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dattrink\\Adminlte3\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b4a7c6f025d985c24c2fd336c084e86::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b4a7c6f025d985c24c2fd336c084e86::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7b4a7c6f025d985c24c2fd336c084e86::$classMap;

        }, null, ClassLoader::class);
    }
}
