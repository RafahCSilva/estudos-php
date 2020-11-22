<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Decorator;

class OrmDecorator implements DecoratorInterface
{
    protected EntityInterface $entity;

    public function setEntity(EntityInterface $entity): void
    {
        $this->entity = $entity;
    }

    public function operation(): string
    {
        return $this->entity->getName() . ' funded in database';
    }
}
