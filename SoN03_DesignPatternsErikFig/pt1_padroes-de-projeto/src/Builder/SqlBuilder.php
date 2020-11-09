<?php


namespace RCS\Db\Builder;

use RCS\Db\QueryBuilder\Strategy;

class SqlBuilder implements BuilderInterface
{
    /**
     * @var Strategy
     */
    private Strategy $query;

    public function __construct(Strategy $query)
    {
        $this->query = $query;
    }

    /**
     * @param string $table
     * @return mixed
     */
    public function setTable(string $table)
    {
        $this->query->table($table);
    }

    /**
     * @return string
     */
    public function getSqlAll(): string
    {
        return $this->query
            ->select()
            ->getQuery();
    }
}
