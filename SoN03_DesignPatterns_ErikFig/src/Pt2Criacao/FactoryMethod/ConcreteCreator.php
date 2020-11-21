<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt2Criacao\FactoryMethod;

class ConcreteCreator implements CreatorInterface
{
    public function factoryMethod(ProductInterface $product): ProductInterface
    {
        $product->setDirectory('images');
        return $product;
    }
}
