<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\ChainOfResponsibility;

class After extends Handler
{
    protected function execute(): void
    {
       echo ' -> depois';
    }
}
