<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\Db\Unit\Builder;

use RCS\Db\App\Model\Banks;
use RCS\Db\App\Model\BanksAlternative;
use PHPUnit\Framework\TestCase;
use RCS\Db\Builder\ModelAbstract;
use RCS\Db\Builder\SqlBuilder;
use RCS\Db\QueryBuilder\MySql;
use RCS\Db\QueryBuilder\Sql;

class ModelAbstractTest extends TestCase
{
    public function testModelWithAutoSetTableName(): void
    {
        $banks = new Banks(new SqlBuilder(new Sql()));
        $sql = $banks->getSqlAll();

        $this->assertEquals('SELECT * FROM banks;', $sql);
    }

    public function testModelWithSetTableName(): void
    {
        $banks = new BanksAlternative(new SqlBuilder(new MySql()));
        $sql = $banks->getSqlAll();

        $this->assertEquals('SELECT * FROM `banks_foobar`;', $sql);
    }

    public function testModelAbstractMocked(): void
    {
        /*
         * Somente necessário testar assim se nao tiver nenhuma outra classe q extend esta Abstract
         */
        $model = $this->getMockForAbstractClass(
            ModelAbstract::class, /* string $originalClassName */
            [new SqlBuilder(new Sql())], /* array $arguments */
            'Abc', /* string $mockClassName */
            true, /* bool $callOriginalConstructor */
            true, /* bool $callOriginalClone */
            true, /* bool $callAutoload */
            [], /* array $mockedMethods */
            false, /* bool $cloneArguments */
        );
        $this->assertInstanceOf(ModelAbstract::class, $model);

        $sql = $model->getSqlAll();
        $this->assertEquals('SELECT * FROM abc;', $sql);
    }
}
