<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\State;

class OpenDoorState extends AbstractDoorState
{
    public function close(): DoorState
    {
        return new ClosedDoorState;
    }
}
