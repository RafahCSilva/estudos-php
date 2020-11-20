<?php
/**
 * @noinspection SqlNoDataSourceInspection
 * @noinspection StaticInvocationViaThisInspection
 */

namespace Tests\RCS\DesignPatterns1\Unit\Pt2Criacao;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt2Criacao\Builder\Director;
use RCS\DesignPatterns1\Pt2Criacao\Builder\MySqlBuilder;
use RCS\DesignPatterns1\Pt2Criacao\Builder\PostgresBuilder;

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
