<?php

namespace RCS\FactoryMethod;

interface ProductInterface
{
    public function setDirectory(string $directory): void;

    public function getImage(): string;
}
