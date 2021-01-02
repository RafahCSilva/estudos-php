<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt4Comportamentais\Command\Invoker;
use RCS\DesignPatterns\Pt4Comportamentais\Command\InvokerException;
use RCS\DesignPatterns\Pt4Comportamentais\Command\TurnOffCommand;
use RCS\DesignPatterns\Pt4Comportamentais\Command\TurnOnCommand;

class CommandTest extends TestCase
{
    public function testCommand(): void
    {
        Invoker::register([
            TurnOnCommand::register() => TurnOnCommand::class,
            TurnOffCommand::register() => TurnOffCommand::class,
        ]);

        // Invoker::call($argv[1]);
        $this->assertEquals('Lamps on!', Invoker::call('turn_on'));
        $this->assertEquals('Lamps off!', Invoker::call('turn_off'));

        $this->expectException(InvokerException::class);
        $this->expectExceptionMessage('Command not found');
        Invoker::call('other');
    }
}
