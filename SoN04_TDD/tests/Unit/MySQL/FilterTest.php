<?php
/** @noinspection StaticInvocationViaThisInspection */

/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 19:22
 */

namespace Tests\RCS\QueryBuilder\Unit\MySQL;

use PHPUnit\Framework\TestCase;
use RCS\QueryBuilder\MySQL\Filters;

class FilterTest extends TestCase
{
    /**
     * @covers \RCS\QueryBuilder\MySQL\Filters
     */
    public function testWhere(): void
    {
        $this->assertEquals(
            'WHERE id=1',
            (new Filters())
                ->where('id', '=', 1)
                ->getSql()
        );
    }

    /**
     * @covers \RCS\QueryBuilder\MySQL\Filters
     */
    public function testOrder(): void
    {
        $this->assertEquals(
            'ORDER BY created desc',
            (new Filters())
                ->order('created', 'desc')
                ->getSql()
        );
    }

    /**
     * @covers \RCS\QueryBuilder\MySQL\Filters
     */
    public function testWhereAndOrder(): void
    {
        $this->assertEquals(
            'WHERE id=1 ORDER BY created desc',
            (new Filters())
                ->where('id', '=', 1)
                ->order('created', 'desc')
                ->getSql()
        );
    }
}
