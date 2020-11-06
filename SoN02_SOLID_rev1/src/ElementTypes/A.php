<?php

namespace Solid\Html\ElementTypes;

use Solid\Html\AttributeException;

class A extends Element
{
    public function validate()
    {
        if (!isset($this->attrs[0])) {
            throw new AttributeException('Attribute href not fount');
        }
        if (!is_string($this->attrs[0])) {
            throw new AttributeException('Attribute href must be string');
        }
        if (!isset($this->attrs[1])) {
            throw new AttributeException('Attribute child not fount');
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
