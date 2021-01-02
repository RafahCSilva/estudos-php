<?php
/** @noinspection StaticInvocationViaThisInspection */

/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 19:36
 */

namespace Tests\RCS\QueryBuilder\Integration\MySQL;

use PHPUnit\Framework\TestCase;
use RCS\QueryBuilder\MySQL\Filters;
use RCS\QueryBuilder\MySQL\Select;

class SelectAndFiltersIntegrationTest extends TestCase
{
    /**
     * @covers \RCS\QueryBuilder\MySQL\Select
     * @covers \RCS\QueryBuilder\MySQL\Filters
     */
    public function testSelectWithFiltroWhereAndOrder(): void
    {
        $this->assertEquals(
            'SELECT * FROM pages WHERE id=1 ORDER BY created desc;',
            (new Select())
                ->table('pages')
                ->filter((new Filters())
                    ->where('id', '=', 1)
                    ->order('created', 'desc')
                )
                ->getSql()
        );
    }

    /**
     * @covers \RCS\QueryBuilder\MySQL\Select
     * @covers \RCS\QueryBuilder\MySQL\Filters
     */
    public function testSelectWithEmptyFilter(): void
    {
        $this->assertEquals(
            'SELECT * FROM pages;',
            (new Select())
                ->table('pages')
                ->filter((new Filters()))
                ->getSql()
        );
    }

    /**
     * @covers \RCS\QueryBuilder\MySQL\Select
     * @covers \RCS\QueryBuilder\MySQL\Filters
     */
    public function testSelectColumnsWithEmptyFilter(): void
    {
        $this->assertEquals(
            'SELECT id, page FROM pages;',
            (new Select())
                ->table('pages')
                ->fields(['id', 'page'])
                ->filter((new Filters()))
                ->getSql()
        );
    }

    /**
     * @covers \RCS\QueryBuilder\MySQL\Select
     * @covers \RCS\QueryBuilder\MySQL\Filters
     */
    public function testSelectColumnsWithFilter(): void
    {
        $this->assertEquals(
            'SELECT id, page FROM pages WHERE id=1 ORDER BY created desc;',
            (new Select())
                ->table('pages')
                ->fields(['id', 'page'])
                ->filter((new Filters())
                    ->where('id', '=', 1)
                    ->order('created', 'desc')
                )
                ->getSql()
        );
    }
}
