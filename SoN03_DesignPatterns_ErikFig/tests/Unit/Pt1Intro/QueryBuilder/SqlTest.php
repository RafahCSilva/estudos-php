<?php
/**
 * @noinspection StaticInvocationViaThisInspection
 * @noinspection SqlNoDataSourceInspection
 */

namespace Tests\RCS\DesignPatterns\Unit\Pt1Intro\QueryBuilder;

use RCS\DesignPatterns\Pt1Intro\QueryBuilder\Sql;
use PHPUnit\Framework\TestCase;

class SqlTest extends TestCase
{
    public function testSelectQuery(): void
    {
        $sql = new Sql();
        $query = $sql->table('users')
            ->select()
            ->getQuery();
        $this->assertEquals('SELECT * FROM users;', $query);
    }

    public function testSelectQueryComColunasEmTexto(): void
    {
        $sql = new Sql();
        $query = $sql->table('users')
            ->select('username, password')
            ->getQuery();
        $this->assertEquals('SELECT username, password FROM users;', $query);
    }

    public function testSelectQueryComColunasEmArray(): void
    {
        $sql = new Sql();
        $query = $sql->table('users')
            ->select(['username', 'password', 'email'])
            ->getQuery();
        $this->assertEquals('SELECT username, password, email FROM users;', $query);
    }
}
