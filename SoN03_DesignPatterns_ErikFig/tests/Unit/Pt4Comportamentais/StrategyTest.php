<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt4Comportamentais\Strategy\DatabaseStorage;
use RCS\DesignPatterns1\Pt4Comportamentais\Strategy\LocalStorage;
use RCS\DesignPatterns1\Pt4Comportamentais\Strategy\LoggerContext;

class StrategyTest extends TestCase
{
    public function testStrategy1(): void
    {
        $db = new DatabaseStorage();

        $this->expectOutputString('salvo no banco de dados');
        (new LoggerContext($db))->setLog('Erro 404 na url ...', 'danger');
    }

    public function testStrategy2(): void
    {
        $local = new LocalStorage(__DIR__);

        $this->expectOutputString('salvo no diretório ' . __DIR__);
        (new LoggerContext($local))->setLog('Erro 404 na url ...', 'danger');
    }
}
