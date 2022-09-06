<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9e77686899e1ae55d8b1f2335cbbe08d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit9e77686899e1ae55d8b1f2335cbbe08d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9e77686899e1ae55d8b1f2335cbbe08d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9e77686899e1ae55d8b1f2335cbbe08d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
