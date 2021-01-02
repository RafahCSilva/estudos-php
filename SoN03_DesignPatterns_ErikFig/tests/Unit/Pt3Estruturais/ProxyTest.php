<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt3Estruturais\Proxy\Proxy;

class ProxyTest extends TestCase
{
    public function testProxy()
    {
        $person = new Proxy('Rafael Cardoso', 26);

        $this->assertEquals('Rafael Cardoso', $person->getName()); //até antes disso, o objeto Person, não existia
        $this->assertEquals('Rafael Cardoso', $person->getName());
        $this->assertEquals(26, $person->getAge());
        $this->assertEquals(3, $person->getCounter());
    }
}
