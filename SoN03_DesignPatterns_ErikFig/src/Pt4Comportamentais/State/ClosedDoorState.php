<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\State;

class ClosedDoorState extends AbstractDoorState
{
    public function open(): DoorState
    {
        return new OpenDoorState;
    }

    public function lock(): DoorState
    {
        return new LockedDoorState;
    }
}
