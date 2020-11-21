<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt2Criacao\FactoryMethod;

class Triangle implements ProductInterface
{
    private string $directory = '/root/';

    public function setDirectory(string $directory): void
    {
        $this->directory .= $directory;
    }

    public function getImage(): string
    {
        return $this->directory . '/tringle.png';
    }
}
