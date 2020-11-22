<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt1Intro\QueryBuilder;

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
     * @param array|string $columns
     * @return Strategy
     */
    public function select($columns = '*'): Strategy
    {
        // if *, then not need treatment
        if ($columns === '*') {
            return $this->renderMySQLSelectQuery($columns);
        }

        // convert String to Array
        if (is_string($columns)) {
            $columns = array_map('trim', explode(',', $columns));
        }

        // force quotes the columns
        $columns = '`' . implode('`, `', $columns) . '`';

        // render MySQL Query
        return $this->renderMySQLSelectQuery($columns);
    }

    /**
     * @return Strategy
     */
    public function getQuery(): string
    {
        return $this->select;
    }

    private function renderMySQLSelectQuery(string $columns): Strategy
    {
        /** @noinspection SqlNoDataSourceInspection */
        $this->select = sprintf('SELECT %s FROM %s;', $columns, $this->table);
        return $this;
    }
}
