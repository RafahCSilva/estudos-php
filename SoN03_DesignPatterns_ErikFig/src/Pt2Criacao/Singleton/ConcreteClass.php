<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\Singleton;

class ConcreteClass
{
    private int $counter = 0;

    public function __construct()
    {
        //xdebug_var_dump('construiu');
    }

    public function __clone()
    {
        //xdebug_var_dump('clonada');
    }

    public function getCounter(): int
    {
        return ++$this->counter;
    }
}
