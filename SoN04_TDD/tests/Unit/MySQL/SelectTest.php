<?php
/** @noinspection StaticInvocationViaThisInspection */

/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 18:42
 */

namespace Tests\RCS\QueryBuilder\Unit\MySQL;

use PHPUnit\Framework\TestCase;
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
}
