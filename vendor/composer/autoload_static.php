<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03986e868afdee1d8c025e626742c2ec
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit03986e868afdee1d8c025e626742c2ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03986e868afdee1d8c025e626742c2ec::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}