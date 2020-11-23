<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Command;

class TurnOffCommand implements Command
{
    private LampReceiver $receiver;

    public function __construct(LampReceiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public static function register(): string
    {
        return 'turn_off';
    }

    public function execute(): string
    {
        return $this->receiver->turnOff();
    }
}
