<?php
/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 19:23
 */

namespace RCS\QueryBuilder\MySQL;

class Filters
{

    private array $sql;

    public function where(string $column, string $operation, string $value): Filters
    {
        $this->sql[] = sprintf('WHERE %s%s%s', $column, $operation, $value);
        return $this;
    }

    public function order(string $column, string $direction): Filters
    {
        $this->sql[] = sprintf('ORDER BY %s %s', $column, $direction);
        return $this;
    }

    public function getSql(): string
    {
        return implode(' ', $this->sql);
    }
}
