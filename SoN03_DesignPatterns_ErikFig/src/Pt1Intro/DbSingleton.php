<?php

namespace RCS\DesignPatterns1\Pt1Intro;

use PDO;

class DbSingleton
{
    protected static ?PDO $instance = null;
    protected static ?string $config = null;

    // Singleton é uma factory, então tem q bloquear estes 3 métodos:
    // @formatter:off
    /** @codeCoverageIgnore */
    protected function __construct(){}
    /** @codeCoverageIgnore */
    protected function __clone(){}
    /** @codeCoverageIgnore */
    protected function __wakeup(){}
    // @formatter:on

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
