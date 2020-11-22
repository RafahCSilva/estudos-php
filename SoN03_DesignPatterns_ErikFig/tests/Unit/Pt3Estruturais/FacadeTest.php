<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt3Estruturais\Decorator\User;
use RCS\DesignPatterns1\Pt3Estruturais\Facade\EntityFacade;

class FacadeTest extends TestCase
{
    public function testFacade(): void
    {
        $facade = new EntityFacade();
        $result = $facade->resolve('Rafael Cardoso');
        $this->assertEquals('Rafael Cardoso funded in database', $result);

        $facade = new EntityFacade();
        $facade->setEntity(new User());
        $result = $facade->resolve('Rafael Cardoso');
        $this->assertEquals('Rafael Cardoso funded in database', $result);
    }
}
