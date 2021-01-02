<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Visitor;

class UpperCaseVisitor implements VisitorInterface
{
    public function convert(ElementAbstract $element): void
    {
        $element->setValue(strtoupper($element->getValue()));
    }
}
