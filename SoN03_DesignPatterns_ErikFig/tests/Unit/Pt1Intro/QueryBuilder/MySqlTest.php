<?php
/**
 * @noinspection StaticInvocationViaThisInspection
 * @noinspection SqlNoDataSourceInspection
 */

namespace Tests\RCS\DesignPatterns1\Unit\Pt1Intro\QueryBuilder;

use RCS\DesignPatterns1\Pt1Intro\QueryBuilder\MySql;
use PHPUnit\Framework\TestCase;

class MySqlTest extends TestCase
{
    public function testSelectQuery(): void
    {
        $query = (new MySql())
            ->table('users')
            ->select()
            ->getQuery();
        $this->assertEquals('SELECT * FROM `users`;', $query);
    }

    public function testSelectQueryComColunasEmTexto(): void
    {
        $query = (new MySql())
            ->table('users')
            ->select('username, password')
            ->getQuery();
        $this->assertEquals('SELECT `username`, `password` FROM `users`;', $query);
    }

    public function testSelectQueryComColunasEmArray(): void
    {
        $query = (new MySql())
            ->table('users')
            ->select(['username', 'password', 'email'])
            ->getQuery();
        $this->assertEquals('SELECT `username`, `password`, `email` FROM `users`;', $query);
    }
}
