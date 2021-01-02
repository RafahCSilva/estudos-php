<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt4Comportamentais\State\Door;
use RCS\DesignPatterns\Pt4Comportamentais\State\IllegalStateTransitionException;
use RCS\DesignPatterns\Pt4Comportamentais\State\OpenDoorState;

class StateTest extends TestCase
{
    public function testState(): void
    {
        //fonte: https://github.com/sebastianbergmann/state

        /*
         * https://github.com/sebastianbergmann/state/raw/master/build/graph.png
         *   Open  -> Close
         *   Close -> Open, Lock
         *   Lock  -> Unlock(Close)
        */


        // Open
        $door = new Door(new OpenDoorState());
        $this->assertEquals(true, $door->isOpen());
        try {
            $door->lock();
        } catch (IllegalStateTransitionException $e) {
            $this->assertInstanceOf(IllegalStateTransitionException::class, $e);
            $this->assertEquals('lock not permitted', $e->getMessage());
        }

        // Close
        $door->close();
        $this->assertEquals(true, $door->isClosed());
        $door->open();
        $this->assertEquals(true, $door->isOpen());
        $door->close();
        try {
            $door->close();
        } catch (IllegalStateTransitionException $e) {
            $this->assertInstanceOf(IllegalStateTransitionException::class, $e);
            $this->assertEquals('close not permitted', $e->getMessage());
        }

        // Lock
        $door->lock();
        $this->assertEquals(true, $door->isLocked());
        try {
            $door->open();
        } catch (IllegalStateTransitionException $e) {
            $this->assertInstanceOf(IllegalStateTransitionException::class, $e);
            $this->assertEquals('open not permitted', $e->getMessage());
        }
        $door->close();
        $this->assertEquals(true, $door->isClosed());
    }
}
