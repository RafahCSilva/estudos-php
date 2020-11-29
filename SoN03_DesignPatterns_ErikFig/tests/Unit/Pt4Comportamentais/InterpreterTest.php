<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt4Comportamentais\Interpreter\Constitution;
use RCS\DesignPatterns1\Pt4Comportamentais\Interpreter\Force;
use RCS\DesignPatterns1\Pt4Comportamentais\Interpreter\Level;
use RCS\DesignPatterns1\Pt4Comportamentais\Interpreter\Life;

class InterpreterTest extends TestCase
{
    public function testInterpreter(): void
    {
        // $life = (fr + con) / 2 + level - arredondar para cima
        $life = new Life(
            new Force(14),
            new Constitution(13),
            new Level(2)
        );

        $this->assertEquals(16, $life->interpret());
        $this->assertEquals(18, $life->interpret(2));
    }
}
