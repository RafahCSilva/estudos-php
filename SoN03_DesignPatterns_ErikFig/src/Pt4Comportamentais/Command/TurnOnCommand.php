<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Command;

class TurnOnCommand implements Command
{
    private LampReceiver $receiver;

    public function __construct(LampReceiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public static function register(): string
    {
        return 'turn_on';
    }

    public function execute():string
    {
        return $this->receiver->turnOn();
    }
}
