<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt1Intro\QueryBuilder;

interface Strategy
{
    public function table(string $table): Strategy;

    public function select($columns = '*'): Strategy;

    public function getQuery(): string;
}
