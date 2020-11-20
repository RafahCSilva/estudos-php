<?php

namespace RCS\DesignPatterns1\Pt1Intro\Builder;

interface BuilderInterface
{
    public function setTable(string $table);

    public function getSqlAll(): string;
}