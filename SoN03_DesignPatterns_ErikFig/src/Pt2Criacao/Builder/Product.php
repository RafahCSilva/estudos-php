<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt2Criacao\Builder;

class Product
{
    public const MYSQL_QUERY = 'SELECT * FROM `%s`';
    public const POSTGRES_QUERY = 'SELECT * FROM %s';
    public string $table;
    public string $query;

    public function getQuery(): string
    {
        return sprintf($this->query, $this->table);
    }
}
