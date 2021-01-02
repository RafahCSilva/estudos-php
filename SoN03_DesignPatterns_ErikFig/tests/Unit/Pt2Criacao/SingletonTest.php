<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt2Criacao;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt2Criacao\Singleton\Singleton;

class SingletonTest extends TestCase
{
    public function testSingleton(): void
    {
        $concrete_class = Singleton::getInstance();
        $this->assertEquals(1, $concrete_class->getCounter());
        $this->assertEquals(2, $concrete_class->getCounter());

        $another_concrete_class = Singleton::getInstance();
        $this->assertEquals(3, $another_concrete_class->getCounter());

        $cloned_class = clone $another_concrete_class;
        $this->assertEquals(4, $cloned_class->getCounter());
        $this->assertNotEquals($another_concrete_class, $cloned_class);
        $this->assertEquals(4, $another_concrete_class->getCounter());

        //var_dump($concrete_class);
        //var_dump($another_concrete_class);
    }
}
