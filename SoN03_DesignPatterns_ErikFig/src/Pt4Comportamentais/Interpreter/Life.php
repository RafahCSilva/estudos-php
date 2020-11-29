<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Interpreter;

class Life implements Interpreter
{
    private Interpreter $force;
    private Interpreter $constitution;
    private Interpreter $level;

    public function __construct(Interpreter $force, Interpreter $constitution, Interpreter $level)
    {
        $this->force = $force;
        $this->constitution = $constitution;
        $this->level = $level;
    }

    public function interpret(int $mod = 0): int
    {
        //= (fr + con) / 2 + level - arredondar para cima
        $result = $this->force->interpret() + $this->constitution->interpret();
        return (int)(ceil($result / 2) + $this->level->interpret() + $mod);
    }
}
