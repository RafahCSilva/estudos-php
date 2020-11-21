<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Bridge;

interface Implementor
{
    public function showAuthor(): string;

    public function showTitle(): string;
}
