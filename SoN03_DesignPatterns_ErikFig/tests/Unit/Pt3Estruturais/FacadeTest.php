<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt3Estruturais\Decorator\User;
use RCS\DesignPatterns\Pt3Estruturais\Facade\EntityFacade;

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
