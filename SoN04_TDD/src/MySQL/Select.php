<?php
/** @noinspection SqlNoDataSourceInspection */

/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 18:49
 */

namespace RCS\QueryBuilder\MySQL;

class Select
{
    private string $table;
    private array $fields;
    private array $filters;

    public function table(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function fields(array $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    public function getSql(): string
    {
        return sprintf(
            "SELECT %s FROM %s%s;",
            empty($this->fields) ?
                '*' :
                implode(', ', $this->fields),
            $this->table,
            empty($this->filters) ?
                '' :
                ' ' . implode(' ', $this->filters),
        );
    }

    public function filter(Filters $filter): Select
    {
        $sql = $filter->getSql();
        if (!empty($sql)) {
            $this->filters[] = $sql;
        }
        return $this;
    }
}
