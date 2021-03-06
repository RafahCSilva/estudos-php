<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt2Criacao;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt2Criacao\Prototype\ConcretePrototype;
use RCS\DesignPatterns\Pt2Criacao\Prototype\ConcretePrototypeException;
use RuntimeException;

class PrototypeTest extends TestCase
{
    public function testPrototype(): void
    {
        $original = new ConcretePrototype();
        $original->setTitle('PHP Essencial');
        $original->setAuthor('Erik Figueiredo');


        $clone1 = clone $original;
        $clone1->setTitle('Node.js para Noobies');
        $this->assertEquals('Node.js para Noobies', $clone1->title);
        $this->assertNotEquals($original, $clone1);


        $clone2 = clone $original;
        $clone2->setTitle('MongoDb bem basiquinho');
        $this->assertEquals('MongoDb bem basiquinho', $clone2->title);
        $this->assertNotEquals($original, $clone2);


        $this->expectException(ConcretePrototypeException::class);
        $this->expectExceptionMessage('Você está indo longe de mais meu filho...');
        $clone3 = clone $clone1;
        $clone3->setTitle('Laravel para artesãos');
    }
}
