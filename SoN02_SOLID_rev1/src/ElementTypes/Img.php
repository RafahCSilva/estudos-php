<?php

namespace Solid\Html\ElementTypes;

use Solid\Html\Exceptions\AttributeException;

class Img extends Element
{
    /**
     * @throws AttributeException
     */
    public function validate(): void
    {
        if (!isset($this->attrs[0])) {
            throw new AttributeException('Attribute src not found');
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
