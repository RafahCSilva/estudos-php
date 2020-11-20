<?php

namespace Tests\RCS\DesignPatterns1\Unit\Pt1Intro\Builder;

use RCS\DesignPatterns1\Pt1Intro\Builder\SqlBuilder;
use RCS\DesignPatterns1\Pt1Intro\Builder\UsersDirector;
use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt1Intro\QueryBuilder\Sql;

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
