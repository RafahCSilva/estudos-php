<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Mediator;

class DatabaseColleague extends Colleague
{
    public function findData(): string
    {
        return 'World';
    }
}
