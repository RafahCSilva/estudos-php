<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Memento;

class Orm
{
    private Entity $entity;
    private Memento $memento;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

    public function save(string $name): void
    {
        $this->backupToMemento();
        $this->entity->setName($name);
    }

    public function delete(): void
    {
        $this->backupToMemento();
        unset($this->entity);
    }

    public function find(): string
    {
        if (!empty($this->entity)) {
            return $this->entity->getName();
        }
        return 'no result';
    }

    public function undo(): void
    {
        $this->entity = $this->memento->getState();
    }

    protected function backupToMemento(): void
    {
        $this->memento = new Memento($this->entity);
    }
}
