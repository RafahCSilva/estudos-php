<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\State;

interface DoorState
{
    public function open(): DoorState;

    public function close(): DoorState;

    public function lock(): DoorState;
}
