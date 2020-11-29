<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Interpreter;

interface Interpreter
{
    public function interpret(int $mod = 0);
}
