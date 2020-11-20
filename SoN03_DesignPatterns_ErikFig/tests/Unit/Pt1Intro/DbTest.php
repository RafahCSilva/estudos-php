<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Test\RCS\DesignPatterns1\Pt1Intro;

use PDO;
use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt1Intro\Builder\ModelAbstract;
use RCS\DesignPatterns1\Pt1Intro\Builder\SqlBuilder;
use RCS\DesignPatterns1\Pt1Intro\Db;
use RCS\DesignPatterns1\Pt1Intro\DbSingleton;
use RCS\DesignPatterns1\Pt1Intro\QueryBuilder\Sql;

class DbTest extends TestCase
{
    private const VALORES = [
        ['id' => 1, 'chave' => 'Foo', 'valor' => 'Bar'],
        ['id' => 2, 'chave' => 'cor', 'valor' => 'azul'],
        ['id' => 3, 'chave' => 'ano', 'valor' => '2020'],
    ];

    /**
     * @ref https://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
     * @ref https://gist.github.com/johnlane/1f962c265ddee07b7bbf
     * @noinspection SqlNoDataSourceInspection
     */
    public function factoryPDOInMemory(): PDO
    {
        // Create connection
        //$memory_db = new PDO('sqlite::memory:');

        // From my singleton class
        DbSingleton::configure('sqlite::memory:');
        $memory_db = DbSingleton::getInstance();

        $memory_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Migrate up
        $memory_db->exec("CREATE TABLE valores (id INTEGER PRIMARY KEY, chave TEXT, valor TEXT)");

        // Seed
        $insert = "INSERT INTO valores (id, chave, valor) VALUES (:id, :chave, :valor)";
        foreach (self::VALORES as $v) {
            $stmt = $memory_db->prepare($insert);
            $stmt->bindValue(':id', $v['id'], SQLITE3_INTEGER);
            $stmt->bindValue(':chave', $v['chave'], SQLITE3_TEXT);
            $stmt->bindValue(':valor', $v['valor'], SQLITE3_TEXT);
            $stmt->execute();
        }

        // Select
        //$sth = $memory_db->query('SELECT * FROM valores');
        //$sth->execute();
        //$result = $sth->fetchAll();
        //xdebug_var_dump(json_encode($result, JSON_PRETTY_PRINT));

        return $memory_db;
    }


    public function testSelectDB()
    {
        $valoresModel = $this->getMockForAbstractClass(
            ModelAbstract::class,
            [new SqlBuilder(new Sql())],
            'Valores'
        );

        $pdo = $this->factoryPDOInMemory();
        $db = new Db($pdo);

        $this->assertInstanceOf(PDO::class, $db->getPdo());
        $this->assertEquals($db->getPdo(), DbSingleton::getInstance());

        $db->setDirector($valoresModel);
        $sth = $db
            ->getAll()
            ->execute();
        $sth->execute();
        $result = $sth->fetchAll();
        //xdebug_var_dump(json_encode($result, JSON_PRETTY_PRINT));

        $this->assertEquals(self::VALORES[1]['valor'], $result[1]['valor']);
    }
}
