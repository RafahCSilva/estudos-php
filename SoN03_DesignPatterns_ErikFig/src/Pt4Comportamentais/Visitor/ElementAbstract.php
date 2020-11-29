<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Visitor;

abstract class ElementAbstract
{
    protected string $value;

    abstract public function validate($value): bool;

    public function setValue($value): void
    {
        if (!$this->validate($value)) {
            throw new \LogicException('Invalid value');
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function accept(VisitorInterface $visitor): void
    {
        $visitor->convert($this);
    }
}
