<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\State;

class Door
{
    private DoorState $state;

    public function __construct(DoorState $state)
    {
        $this->setState($state);
    }

    private function setState(DoorState $state): void
    {
        $this->state = $state;
    }

    public function open(): void
    {
        $this->setState($this->state->open());
    }

    public function close(): void
    {
        $this->setState($this->state->close());
    }

    public function lock(): void
    {
        $this->setState($this->state->lock());
    }

    public function isOpen(): bool
    {
        return $this->state instanceof OpenDoorState;
    }

    public function isClosed(): bool
    {
        return $this->state instanceof ClosedDoorState;
    }

    public function isLocked(): bool
    {
        return $this->state instanceof LockedDoorState;
    }
}
