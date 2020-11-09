<?php

namespace RCS\Db\QueryBuilder;

class MySql implements Strategy
{
    private string $table;
    private string $select;

    /**
     * @param string $table
     * @return Strategy
     */
    public function table(string $table): Strategy
    {
        $this->table = "`{$table}`";
        return $this;
    }

    /**
     * @param string|array $columns
     * @return Strategy
     */
    public function select($columns = '*'): Strategy
    {
        if ($columns !== '*' && is_string($columns)) {
            $columns = explode(',', $columns);
            $columns = array_map('trim', $columns);
        }

        if (is_array($columns)) {
            $columns = implode('`, `', $columns);
            $columns = "`{$columns}`";
        }
        /** @noinspection SqlNoDataSourceInspection */
        $this->select = sprintf('SELECT %s FROM %s;', $columns, $this->table);
        return $this;
    }

    /**
     * @return Strategy
     */
    public function getQuery(): string
    {
        return $this->select;
    }
}
