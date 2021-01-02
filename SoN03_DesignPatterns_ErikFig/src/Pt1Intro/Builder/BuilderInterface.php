<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt1Intro\Builder;

interface BuilderInterface
{
    public function setTable(string $table);

    public function getSqlAll(): string;
}
