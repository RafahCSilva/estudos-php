<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Mediator;

interface MediatorInterface
{
    public function sendResult($content): void;

    public function makeRequest(): void;

    public function queryDb(): string;
}
