<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt4Comportamentais\Memento\Entity;
use RCS\DesignPatterns1\Pt4Comportamentais\Memento\Orm;

class MementoTest extends TestCase
{
    public function testMemento(): void
    {
        $user = new Entity();
        $user->setName('Erik');

        $orm = new Orm($user);
        $this->assertEquals('Erik', $orm->find());

        // Update name
        $orm->save('Figueiredo');
        $this->assertEquals('Figueiredo', $orm->find());

        // restore with memento
        $orm->undo();
        $this->assertEquals('Erik', $orm->find());

        // remove entity
        $orm->delete();
        $this->assertEquals('no result', $orm->find());

        // restore undo with memento
        $orm->undo();
        $this->assertEquals('Erik', $orm->find());
    }
}
