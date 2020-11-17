<?php

namespace RCS\FactoryMethod;

interface CreatorInterface
{
    public function factoryMethod(ProductInterface $product): ProductInterface;
}
