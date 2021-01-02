<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\FactoryMethod;

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
