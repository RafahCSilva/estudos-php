<?php

namespace RCS\DesignPatterns1\Pt2Criacao\FactoryMethod;

interface ProductInterface
{
    public function setDirectory(string $directory): void;

    public function getImage(): string;
}