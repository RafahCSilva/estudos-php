<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt4Comportamentais\ChainOfResponsibility\After;
use RCS\DesignPatterns1\Pt4Comportamentais\ChainOfResponsibility\Before;
use RCS\DesignPatterns1\Pt4Comportamentais\ChainOfResponsibility\Handler;
use RCS\DesignPatterns1\Pt4Comportamentais\ChainOfResponsibility\Request;

class ChainOfResponsibilityTest extends TestCase
{
    public function testChainOfResponsibility(): void
    {
        $before = new Before();
        $request = new Request();
        $after = new After();

        $auth = new class extends Handler {
            protected function execute(): void
            {
                echo ' -> autenticação';
            }
        };

        // auth -> before -> request -> after
        $auth->successor($before);
        $before->successor($request);
        $request->successor($after);

        // Run Chair
        $auth->handlerRequest();

        $this->expectOutputString(' -> autenticação -> antes -> requisição -> depois');


        // Run chair manually
        /*
        $next = $auth;
        while($next) {
            $next->handlerRequest();
            $next = $next->next();
        }
        */
    }
}
