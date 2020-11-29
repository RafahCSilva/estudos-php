<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Mediator;

class ClientColleague extends Colleague
{
    public function request(): void
    {
        $this->mediator->makeRequest();
    }

    public function output(string $context): void
    {
        echo $context;
    }
}
