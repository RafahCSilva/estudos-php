<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Memento;

class Memento
{
    private Entity $obj;

    public function __construct(Entity $obj)
    {
        $this->obj = clone $obj;
    }

    public function getState(): Entity
    {
        return clone $this->obj;
    }
}
