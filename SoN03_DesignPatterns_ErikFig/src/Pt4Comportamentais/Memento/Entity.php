<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Memento;

class Entity
{
    private string $name;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
