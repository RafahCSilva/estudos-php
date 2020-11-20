<?php

namespace RCS\DesignPatterns1\Pt2Criacao\FactoryMethod;

interface CreatorInterface
{
    public function factoryMethod(ProductInterface $product): ProductInterface;
}
