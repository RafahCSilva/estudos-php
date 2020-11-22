<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Decorator;

interface DecoratorInterface
{
    public function setEntity(EntityInterface $entity);
    public function operation() :string;
}
