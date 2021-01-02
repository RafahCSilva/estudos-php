<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt4Comportamentais\Mediator\ClientColleague;
use RCS\DesignPatterns\Pt4Comportamentais\Mediator\DatabaseColleague;
use RCS\DesignPatterns\Pt4Comportamentais\Mediator\Mediator;
use RCS\DesignPatterns\Pt4Comportamentais\Mediator\ServerColleague;

class MediatorTest extends TestCase
{
    public function testMediator(): void
    {
        //exemplo base https://github.com/domnikl/DesignPatternsPHP/tree/master/Behavioral/Mediator
        $client = new ClientColleague();
        new Mediator($client, new ServerColleague(), new DatabaseColleague());

        $this->expectOutputString('Hello World');
        $client->request();
        /*
        C->req()
            M->makeRequest() => S->process()
                $data = M->queryDb() => DB->findData()
                    ret 'World'
                ret M->sendResult('Hello '.$data) => C->output($content)
                    echo $context
         */
    }
}
