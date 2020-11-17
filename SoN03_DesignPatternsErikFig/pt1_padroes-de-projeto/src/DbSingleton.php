<?php

namespace RCS\Db;

use PDO;

class DbSingleton
{
    protected static ?PDO $instance = null;
    protected static ?string $config = null;

    // Singleton é uma factory, então tem q bloquear estes 3 métodos:
    //   protected function __construct(){}
    //   protected function __clone(){}
    //   protected function __wakeup(){}

    public static function configure(string $config): void
    {
        self::$config = $config;
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(self::$config);
        }
        return self::$instance;
    }
}
