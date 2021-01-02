<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt3Estruturais\Decorator\MigrationDecorator;
use RCS\DesignPatterns\Pt3Estruturais\Decorator\OrmDecorator;
use RCS\DesignPatterns\Pt3Estruturais\Decorator\User;

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

    public function testDecoratorByReflection(): void
    {
        $user = new User();
        $user->setName('Rafael Cardoso');

        $reflector = new \ReflectionClass(User::class);
        $docComment = $reflector->getDocComment();

        preg_match('/@decorator ([0-9a-zA-Z]+)/', $docComment, $matches);

        if (!isset($matches[1])) {
            return;
        }
        $class = '\\RCS\\DesignPatterns\\Pt3Estruturais\\Decorator\\' . $matches[1] . 'Decorator';

        /** @var OrmDecorator $orm */
        $orm = new $class;
        $orm->setEntity($user);
        $result = $orm->operation();
        $this->assertEquals('Rafael Cardoso funded in database', $result);
    }
}
