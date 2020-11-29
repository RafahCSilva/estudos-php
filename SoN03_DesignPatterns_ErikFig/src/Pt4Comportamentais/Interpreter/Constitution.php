<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Interpreter;

class Constitution implements Interpreter
{
    public int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function interpret(int $mod = 0): int
    {
        return $this->value + $mod;
    }
}
