<?php

namespace RCS\DesignPatterns1\Pt1Intro\Builder;

class UsersDirector implements DirectorInterface
{
    /**
     * @var BuilderInterface|null
     */
    protected ?BuilderInterface $builder;

    /**
     * SqlDirector constructor.
     * @param BuilderInterface|null $builder
     */
    public function __construct(BuilderInterface $builder = null)
    {
        $this->builder = $builder;
    }

    /**
     * @return string
     */
    public function getSqlAll(): string
    {
        $this->builder->setTable('users');
        return $this->builder->getSqlAll();
    }
}
