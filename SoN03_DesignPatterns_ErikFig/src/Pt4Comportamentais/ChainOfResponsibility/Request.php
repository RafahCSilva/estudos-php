<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\ChainOfResponsibility;

class Request extends Handler
{
    protected function execute(): void
    {
        echo ' -> requisição';
    }
}
