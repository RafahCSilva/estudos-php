<?php

namespace RCS\DesignPatterns1\Pt2Criacao\Builder;

interface BuilderInterface
{
    public function setTable(string $table);

    public function setQuery();

    public function getResult(): Product;
}
