<?php

namespace Solid\Html\ElementTypes;

use Solid\Html\Exceptions\AttributeException;

class A extends Element
{
    /**
     * @throws AttributeException
     */
    public function validate(): void
    {
        if (!isset($this->attrs[0])) {
            throw new AttributeException('Attribute href not found');
        }
        if (!is_string($this->attrs[0])) {
            throw new AttributeException('Attribute href must be string');
        }
        if (!isset($this->attrs[1])) {
            throw new AttributeException('Attribute child not found');
        }
        if (!is_string($this->attrs[1])) {
            throw new AttributeException('Attribute child must be string');
        }
    }

    public function __toString(): string
    {
        return "<a href=\"{$this->attrs[0]}\"{$this->optional_attrs}>{$this->attrs[1]}</a>";
    }
}
