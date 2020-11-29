<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Visitor;

interface VisitorInterface
{
    public function convert(ElementAbstract $element): void;
}
