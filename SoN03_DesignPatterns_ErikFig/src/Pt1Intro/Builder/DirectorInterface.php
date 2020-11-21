<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt1Intro\Builder;

interface DirectorInterface
{
    public function __construct(BuilderInterface $builder = null);

    public function getSqlAll(): string;
}
