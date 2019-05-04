<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4fdf9e5b752dc9170d2c52e6698d1ab2
{
    public static $classMap = array (
        'Conn' => __DIR__ . '/../..' . '/app/Conn/Conn.class.php',
        'Create' => __DIR__ . '/../..' . '/app/Conn/Create.class.php',
        'Data' => __DIR__ . '/../..' . '/app/Class/Data.class.php',
        'Delete' => __DIR__ . '/../..' . '/app/Conn/Delete.class.php',
        'Edital' => __DIR__ . '/../..' . '/app/Class/Edital.class.php',
        'Read' => __DIR__ . '/../..' . '/app/Conn/Read.class.php',
        'Update' => __DIR__ . '/../..' . '/app/Conn/Update.class.php',
        'Uploud' => __DIR__ . '/../..' . '/app/Helpers/Uploud.class.php',
        'Url' => __DIR__ . '/../..' . '/app/Class/Url.class.php',
        'Url_amigavel' => __DIR__ . '/../..' . '/app/Class/Url_amigavel.class.php',
        'Usuario' => __DIR__ . '/../..' . '/app/Class/Usuario.class.php',
        'Valida' => __DIR__ . '/../..' . '/app/Helpers/Valida.class.php',
        'ValidaCPFCNPJ' => __DIR__ . '/../..' . '/app/Class/ValidaCPF.class.php',
        'Validation' => __DIR__ . '/../..' . '/app/Conn/Validation.class.php',
        'View' => __DIR__ . '/../..' . '/app/Helpers/View.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit4fdf9e5b752dc9170d2c52e6698d1ab2::$classMap;

        }, null, ClassLoader::class);
    }
}
