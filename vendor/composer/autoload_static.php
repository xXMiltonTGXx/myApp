<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit366d52fc20f6565171bc5e4c35f795c0
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Milton\\Miapp\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Milton\\Miapp\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit366d52fc20f6565171bc5e4c35f795c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit366d52fc20f6565171bc5e4c35f795c0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit366d52fc20f6565171bc5e4c35f795c0::$classMap;

        }, null, ClassLoader::class);
    }
}