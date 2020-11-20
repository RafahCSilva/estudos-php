<?php

namespace RCS\DesignPatterns1\Pt2Criacao\FactoryMethod;

class Circle implements ProductInterface
{
    private ?string $directory;

    public function setDirectory(string $directory): void
    {
        $this->directory = $directory;
    }

    public function getImage(): string
    {
        return $this->directory . '/circle.png';
    }
}
