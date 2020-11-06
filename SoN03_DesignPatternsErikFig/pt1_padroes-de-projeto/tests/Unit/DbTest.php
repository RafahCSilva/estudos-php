<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Test\RCS\Db;

use PHPUnit\Framework\TestCase;
use RCS\Db\Db;

class DbTest extends TestCase
{
    public function testTestarSeaClaseEstaInstanciando()
    {
        $db = new Db();
        $this->assertInstanceOf(Db::class, $db);
    }
}
