<?php

namespace RCS\DesignPatterns1\Pt1Intro\Builder;

abstract class ModelAbstract implements DirectorInterface
{
    protected ?BuilderInterface $builder;

    protected $table;

    public function __construct(BuilderInterface $builder = null)
    {
        $this->builder = $builder;
        $this->setTableName();
    }

    public function getSqlAll(): string
    {
        $this->builder->setTable($this->table);
        return $this->builder->getSqlAll();
    }

    protected function setTableName(): void
    {
        if ($this->table === null) {
            $table = explode('\\', get_called_class());
            $table = array_pop($table);
            $this->table = strtolower($table);
        }
    }
}
