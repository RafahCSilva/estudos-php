<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Visitor;

class UpperCaseVisitor implements VisitorInterface
{
    public function convert(ElementAbstract $element): void
    {
        $element->setValue(strtoupper($element->getValue()));
    }
}
