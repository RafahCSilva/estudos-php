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

    public function table(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function getSql(): string
    {
        return sprintf("SELECT * FROM %s;", $this->table);
    }
}
