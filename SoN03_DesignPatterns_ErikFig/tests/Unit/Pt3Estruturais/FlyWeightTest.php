<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt3Estruturais\FlyWeight\FlyWeightFactory;

class FlyWeightTest extends TestCase
{
    /** @noinspection PhpUnusedLocalVariableInspection */
    public function testFlyWeight(): void
    {
        $factory = new FlyWeightFactory();

        $soldier0 = $factory->getSoldier(0);
        $soldier1 = $factory->getSoldier(1);
        $soldier2 = $factory->getSoldier(2);
        $soldier3 = $factory->getSoldier(3);
        $soldier4 = $factory->getSoldier(4);

        $soldier6_2 = $factory->getSoldier(2);
        $soldier7_3 = $factory->getSoldier(3);
        $soldier8_4 = $factory->getSoldier(4);

        $this->assertEquals($soldier2, $soldier6_2);
        $this->assertEquals($soldier2->getName(), $soldier6_2->getName());
        $this->assertEquals($soldier2->getAge(), $soldier6_2->getAge());
    }
}
