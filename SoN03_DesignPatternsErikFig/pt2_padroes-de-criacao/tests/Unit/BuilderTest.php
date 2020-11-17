<?php
/**
 * @noinspection SqlNoDataSourceInspection
 * @noinspection StaticInvocationViaThisInspection
 */

namespace Tests\RCS\Unit;

use PHPUnit\Framework\TestCase;
use RCS\Builder\Director;
use RCS\Builder\MySqlBuilder;
use RCS\Builder\PostgresBuilder;

class BuilderTest extends TestCase
{
    public function testMySqlBuilder(): void
    {
        $result = (new Director(new MySqlBuilder()))
            ->getQuery('users');

        $this->assertEquals('SELECT * FROM `users`', $result->getQuery());
    }

    public function testPostgresBuilder(): void
    {
        $result = (new Director(new PostgresBuilder()))
            ->getQuery('users');

        $this->assertEquals('SELECT * FROM users', $result->getQuery());
    }
}
