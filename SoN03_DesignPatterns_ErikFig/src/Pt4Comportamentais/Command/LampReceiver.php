<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Command;

//podia implementar uma interface
class LampReceiver
{
    public function turnOn(): string
    {
        return 'Lamps on!';
    }

    public function turnOff(): string
    {
        return 'Lamps off!';
    }
}
