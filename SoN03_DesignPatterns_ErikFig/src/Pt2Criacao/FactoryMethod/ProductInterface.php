<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\FactoryMethod;

interface ProductInterface
{
    public function setDirectory(string $directory): void;

    public function getImage(): string;
}
