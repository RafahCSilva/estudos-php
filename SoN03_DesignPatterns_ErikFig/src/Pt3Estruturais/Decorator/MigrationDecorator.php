<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Decorator;

class MigrationDecorator implements DecoratorInterface
{
    protected EntityInterface $entity;

    public function setEntity(EntityInterface $entity): void
    {
        $this->entity = $entity;
    }

    public function operation(): string
    {
        $name = get_class($this->entity);
        $name = explode('\\', $name);
        $name = array_pop($name);
        return strtolower($name) . 's migrated';
    }
}
