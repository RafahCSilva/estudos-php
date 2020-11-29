<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Visitor;

class StringElement extends ElementAbstract
{
    public function validate($value): bool
    {
        return is_string($value);
    }
}
