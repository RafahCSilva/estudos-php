<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Decorator;

interface DecoratorInterface
{
    public function setEntity(EntityInterface $entity);
    public function operation() :string;
}
