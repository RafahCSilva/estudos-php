<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt4Comportamentais\Iterator\MyIterator;
use RCS\DesignPatterns\Pt4Comportamentais\Iterator\MyIteratorTwo;

class IteratorTest extends TestCase
{
    public function testIterator(): void
    {
        $data = [
            'firstelement',
            'secondelement',
            'lastelement',
        ];
        $iterator = new MyIterator($data); //com dump dos nomes dos metodos

        $i = 0;
        foreach ($iterator as $key => $value) {
            $this->assertEquals($data[$i++], $value);
        }

        $i = 0;
        $iterator->rewind();
        $this->assertEquals(0, $iterator->key());
        while ($iterator->valid()) {
            $this->assertEquals($i, $iterator->key());
            $this->assertEquals($data[$i++], $iterator->current());
            $iterator->next();
        }
    }
}
