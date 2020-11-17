<?php

namespace RCS\Singleton;

class Singleton
{
    protected static ?ConcreteClass $instance = null;

//    protected function __construct()
//    {
//    }

    public static function getInstance(): ConcreteClass
    {
        if (self::$instance === null) {
            self::$instance = new ConcreteClass;
        }
        return self::$instance;
    }

//    protected function __clone()
//    {
//    }
}
