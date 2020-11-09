<?php

namespace Tests\RCS\Db\Unit\Builder;

use RCS\Db\Builder\SqlBuilder;
use RCS\Db\Builder\UsersDirector;
use PHPUnit\Framework\TestCase;
use RCS\Db\QueryBuilder\Sql;

class UsersDirectorTest extends TestCase
{
    public function testGetSqlAll()
    {
        $query = new Sql();
        $builder = new SqlBuilder($query);
        $director = new UsersDirector($builder);
        $sql = $director->getSqlAll();

        $this->assertEquals('SELECT * FROM users;', $sql);
    }
}
