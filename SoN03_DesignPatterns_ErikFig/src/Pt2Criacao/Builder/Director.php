<?php

namespace RCS\DesignPatterns1\Pt2Criacao\Builder;

class Director
{
    private BuilderInterface $builder;

    public function __construct(BuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function getQuery($table): Product
    {
        $this->builder->setTable($table);
        $this->builder->setQuery();
        return $this->builder->getResult();
    }
}
