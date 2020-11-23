<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\ChainOfResponsibility;

class Before extends Handler
{
    protected function execute(): void
    {
        echo ' -> antes';
    }
}
