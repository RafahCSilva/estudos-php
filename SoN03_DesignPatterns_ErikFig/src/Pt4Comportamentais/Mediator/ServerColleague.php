<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Mediator;

class ServerColleague extends Colleague
{
    public function process(): void
    {
        $data = $this->mediator->queryDb();
        $this->mediator->sendResult('Hello ' . $data);
    }
}
