<?php
/** @noinspection StaticInvocationViaThisInspection */

/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 18:42
 */

namespace Test\RCS\QueryBuilder\Unit\MySQL;

use PHPUnit\Framework\TestCase;
use RCS\QueryBuilder\MySQL\Select;

class SelectTest extends TestCase
{

    /**
     * @covers \RCS\QueryBuilder\MySQL\Select
     */
    public function testSelectSemFiltro(): void
    {
        $select = new Select();
        $select->table('pages');

        $actual = $select->getSql();
        $expected = 'SELECT * FROM pages;';

        $this->assertEquals($expected, $actual);
    }

}
