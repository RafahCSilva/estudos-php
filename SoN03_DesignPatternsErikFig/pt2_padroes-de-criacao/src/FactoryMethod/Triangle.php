<?php

namespace RCS\FactoryMethod;

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
