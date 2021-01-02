<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt1Intro\Builder;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt1Intro\App\Model\Banks;
use RCS\DesignPatterns\Pt1Intro\App\Model\BanksAlternative;
use RCS\DesignPatterns\Pt1Intro\Builder\ModelAbstract;
use RCS\DesignPatterns\Pt1Intro\Builder\SqlBuilder;
use RCS\DesignPatterns\Pt1Intro\QueryBuilder\MySql;
use RCS\DesignPatterns\Pt1Intro\QueryBuilder\Sql;

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
