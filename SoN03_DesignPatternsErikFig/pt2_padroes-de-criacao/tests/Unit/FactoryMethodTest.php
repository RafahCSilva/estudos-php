<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\Unit;

use RCS\FactoryMethod\Circle;
use RCS\FactoryMethod\ConcreteCreator;
use RCS\FactoryMethod\Triangle;

class FactoryMethodTest extends \PHPUnit\Framework\TestCase
{
    public function testFactoryMethod()
    {
        $circle = (new ConcreteCreator())
            ->factoryMethod(new Circle());
        $this->assertEquals('images/circle.png', $circle->getImage());

        $triangle = (new ConcreteCreator())
            ->factoryMethod(new Triangle());
        $this->assertEquals('/root/images/tringle.png', $triangle->getImage());
    }
}
