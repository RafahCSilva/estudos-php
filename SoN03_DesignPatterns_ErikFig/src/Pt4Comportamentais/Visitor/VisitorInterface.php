<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Visitor;

interface VisitorInterface
{
    public function convert(ElementAbstract $element): void;
}
