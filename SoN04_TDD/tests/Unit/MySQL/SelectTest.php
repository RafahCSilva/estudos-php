<?php
/**
 * @noinspection SqlNoDataSourceInspection
 * @noinspection StaticInvocationViaThisInspection
 */

/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 18:42
 */

namespace Tests\RCS\QueryBuilder\Unit\MySQL;

use PHPUnit\Framework\TestCase;
use RCS\QueryBuilder\MySQL\Filters;
use RCS\QueryBuilder\MySQL\Select;

/**
 * Class SelectTest
 * @package Test\RCS\QueryBuilder\Unit\MySQL
 */
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

        $this->assertEquals(
            'SELECT * FROM testes;',
            (new Select())
                ->table('testes')
                ->getSql()
        );
    }

    /**
     * @covers \RCS\QueryBuilder\MySQL\Select
     */
    public function testSelectEspecificandoOsCampos(): void
    {
        $this->assertEquals(
            'SELECT name, email FROM users;',
            (new Select())
                ->table('users')
                ->fields(['name', 'email'])
                ->getSql()
        );
    }

    /**
     * @covers \RCS\QueryBuilder\MySQL\Select
     */
    public function testSelectWithMockFilter(): void
    {
        $filterMocked = $this
            ->getMockBuilder(Filters::class)
            ->disableOriginalConstructor()
            ->getMock();
        $filterMocked
            ->method('getSql')
            ->willReturn('WHERE id=1 ORDER BY created desc');

        // 01
        $this->assertEquals(
            'SELECT * FROM pages WHERE id=1 ORDER BY created desc;',
            (new Select())
                ->table('pages')
                ->filter($filterMocked)
                ->getSql()
        );

        // 11
        $this->assertEquals(
            'SELECT id, page FROM pages WHERE id=1 ORDER BY created desc;',
            (new Select())
                ->table('pages')
                ->fields(['id', 'page'])
                ->filter($filterMocked)
                ->getSql()
        );


        $filterMockedEmpty = $this
            ->getMockBuilder(Filters::class)
            ->disableOriginalConstructor()
            ->getMock();
        $filterMockedEmpty
            ->method('getSql')
            ->willReturn('');

        // 00
        $this->assertEquals(
            'SELECT * FROM pages;',
            (new Select())
                ->table('pages')
                ->filter($filterMockedEmpty)
                ->getSql()
        );

        // 10
        $this->assertEquals(
            'SELECT id, page FROM pages;',
            (new Select())
                ->table('pages')
                ->fields(['id', 'page'])
                ->filter($filterMockedEmpty)
                ->getSql()
        );
    }

}
