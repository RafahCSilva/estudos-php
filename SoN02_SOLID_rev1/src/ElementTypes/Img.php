<?php

namespace Solid\Html\ElementTypes;

use Solid\Html\AttributeException;

class Img extends Element
{
    public function validate()
    {
        if (!isset($this->attrs[0])) {
            throw new AttributeException('Attribute src not fount');
        }
        if (!is_string($this->attrs[0])) {
            throw new AttributeException('Attribute src must be string');
        }
    }

    public function __toString(): string
    {
        return "<img src=\"{$this->attrs[0]}\"/>";
    }
}
