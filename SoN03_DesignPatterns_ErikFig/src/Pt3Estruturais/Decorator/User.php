<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Decorator;

class User implements EntityInterface
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
