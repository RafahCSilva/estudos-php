<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\Builder;

class PostgresBuilder implements BuilderInterface
{
    private Product $query_builder;

    public function __construct()
    {
        $this->query_builder = new Product;
    }

    public function setTable(string $table): void
    {
        $this->query_builder->table = $table;
    }

    public function setQuery(): void
    {
        $this->query_builder->query = Product::POSTGRES_QUERY;
    }

    public function getResult(): Product
    {
        return $this->query_builder;
    }
}
