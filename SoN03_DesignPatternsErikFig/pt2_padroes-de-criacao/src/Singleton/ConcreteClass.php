<?php

namespace RCS\Singleton;

class ConcreteClass
{
    private int $counter = 0;

    public function __construct()
    {
        var_dump('construiu');
    }

    public function __clone()
    {
        var_dump('clonada');
    }

    public function getCounter(): int
    {
        return ++$this->counter;
    }
}
