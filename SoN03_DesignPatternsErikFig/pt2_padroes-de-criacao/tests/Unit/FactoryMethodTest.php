<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\Unit;

use PHPUnit\Framework\TestCase;
use RCS\FactoryMethod\Circle;
use RCS\FactoryMethod\ConcreteCreator;
use RCS\FactoryMethod\Triangle;

class FactoryMethodTest extends TestCase
{
    public function testFactoryMethod(): void
    {
        $circle = (new ConcreteCreator())
            ->factoryMethod(new Circle());
        $this->assertEquals('images/circle.png', $circle->getImage());

        $triangle = (new ConcreteCreator())
            ->factoryMethod(new Triangle());
        $this->assertEquals('/root/images/tringle.png', $triangle->getImage());
    }
}
