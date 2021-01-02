<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\Builder;

interface BuilderInterface
{
    public function setTable(string $table);

    public function setQuery();

    public function getResult(): Product;
}
