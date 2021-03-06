<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\TemplateMethod;

class IncreaseOrder extends OrderAbstract
{
    protected function changeValue(int $value): int
    {
        return $value;
    }
}
