<?php

namespace RCS\Builder;

class MySqlBuilder implements BuilderInterface
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
        $this->query_builder->query = Product::MYSQL_QUERY;
    }

    public function getResult(): Product
    {
        return $this->query_builder;
    }
}
