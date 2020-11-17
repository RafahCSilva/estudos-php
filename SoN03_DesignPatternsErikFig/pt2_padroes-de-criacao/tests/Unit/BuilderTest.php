<?php
/**
 * @noinspection SqlNoDataSourceInspection
 * @noinspection StaticInvocationViaThisInspection
 */

namespace Tests\RCS\Unit;

class BuilderTest extends \PHPUnit\Framework\TestCase
{
    public function testMySqlBuilder()
    {
        $result = (new \RCS\Builder\Director(new \RCS\Builder\MySqlBuilder()))
            ->getQuery('users');

        $this->assertEquals('SELECT * FROM `users`', $result->getQuery());
    }

    public function testPostgresBuilder()
    {
        $result = (new \RCS\Builder\Director(new \RCS\Builder\PostgresBuilder()))
            ->getQuery('users');

        $this->assertEquals('SELECT * FROM users', $result->getQuery());
    }
}
