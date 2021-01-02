<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Facade;

use RCS\DesignPatterns\Pt3Estruturais\Decorator\EntityInterface;
use RCS\DesignPatterns\Pt3Estruturais\Decorator\OrmDecorator;
use RCS\DesignPatterns\Pt3Estruturais\Decorator\User;

class EntityFacade
{
    private ?EntityInterface $entity = null;

    public function setEntity(EntityInterface $entity): void
    {
        $this->entity = $entity;
    }

    public function resolve($name): string
    {
        if ($this->entity === null) {
            $this->setEntity(new User());
        }

        $this->entity->setName($name);

        preg_match(
            '/@decorator ([0-9a-zA-Z]+)/',
            (new \ReflectionClass(get_class($this->entity)))->getDocComment(),
            $matches
        );
        $class = '\\RCS\\DesignPatterns\\Pt3Estruturais\\Decorator\\' . $matches[1] . 'Decorator';

        /** @var OrmDecorator $orm */
        $orm = new $class;
        $orm->setEntity($this->entity);
        return $orm->operation();
    }
}
