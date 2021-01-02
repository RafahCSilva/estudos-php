<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\TemplateMethod;

abstract class OrderAbstract
{
    public function finalValue($value, $size, $changeValue): string
    {
        $value += $this->frete($size);
        $value += $this->changeValue($changeValue);

        return number_format($value, 2, ',', '.');
    }

    abstract protected function changeValue(int $value): int;

    protected function frete(int $size): int
    {
        return $size * 1;
    }
}
