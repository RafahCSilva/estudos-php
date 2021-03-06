<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\FactoryMethod;

interface CreatorInterface
{
    public function factoryMethod(ProductInterface $product): ProductInterface;
}
