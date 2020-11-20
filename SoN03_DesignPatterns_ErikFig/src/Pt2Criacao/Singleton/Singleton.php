<?php

namespace RCS\DesignPatterns1\Pt2Criacao\Singleton;

class Singleton
{
    protected static ?ConcreteClass $instance = null;

    // Singleton é uma factory, então tem q bloquear estes 3 métodos:
    // @formatter:off
    /** @codeCoverageIgnore */
    protected function __construct(){}
    /** @codeCoverageIgnore */
    protected function __clone(){}
    /** @codeCoverageIgnore */
    protected function __wakeup(){}
    // @formatter:on

    public static function getInstance(): ConcreteClass
    {
        if (self::$instance === null) {
            self::$instance = new ConcreteClass;
        }
        return self::$instance;
    }
}
