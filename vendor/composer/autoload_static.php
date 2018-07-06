<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf2ae7b74a3b9b414e0039eaea761c22
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcf2ae7b74a3b9b414e0039eaea761c22::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcf2ae7b74a3b9b414e0039eaea761c22::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}