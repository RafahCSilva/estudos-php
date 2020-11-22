<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt3Estruturais\Decorator\MigrationDecorator;
use RCS\DesignPatterns1\Pt3Estruturais\Decorator\OrmDecorator;
use RCS\DesignPatterns1\Pt3Estruturais\Decorator\User;

class DecoratorTest extends TestCase
{
    public function testDecorator(): void
    {
        $user = new User();
        $user->setName('Rafael Cardoso');

        $orm = new OrmDecorator();
        $orm->setEntity($user);
        $result = $orm->operation();
        $this->assertEquals('Rafael Cardoso funded in database', $result);

        $migration = new MigrationDecorator();
        $migration->setEntity($user);
        $result = $migration->operation();
        $this->assertEquals('users migrated', $result);
    }
}
