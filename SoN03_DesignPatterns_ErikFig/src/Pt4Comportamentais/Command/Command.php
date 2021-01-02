<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Command;

interface Command
{
    public static function register(): string;

    public function execute(): string;
}
