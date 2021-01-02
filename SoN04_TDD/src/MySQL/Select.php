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
            "SELECT %s FROM %s;",
            empty($this->fields) ? '*' : implode(', ', $this->fields),
            $this->table
        );
    }
}
