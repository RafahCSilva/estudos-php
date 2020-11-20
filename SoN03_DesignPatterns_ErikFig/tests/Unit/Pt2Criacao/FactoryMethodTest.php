<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt2Criacao;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt2Criacao\FactoryMethod\Circle;
use RCS\DesignPatterns1\Pt2Criacao\FactoryMethod\ConcreteCreator;
use RCS\DesignPatterns1\Pt2Criacao\FactoryMethod\Triangle;

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
