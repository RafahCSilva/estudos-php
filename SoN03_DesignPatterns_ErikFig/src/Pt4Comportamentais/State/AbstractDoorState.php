<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\State;

abstract class AbstractDoorState implements DoorState
{
    /**
     * @throws IllegalStateTransitionException
     */
    public function open(): DoorState
    {
        throw new IllegalStateTransitionException('open not permitted');
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function close(): DoorState
    {
        throw new IllegalStateTransitionException('close not permitted');
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function lock(): DoorState
    {
        throw new IllegalStateTransitionException('lock not permitted');
    }
}
