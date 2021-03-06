<?php

namespace Solid\Html;

class Attributes
{
    private $attributes;

    /**
     * Attributes constructor.
     * @param $attributes
     */
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    public function __toString(): string
    {
        $result = [];
        foreach ($this->attributes as $key => $value) {
            $result[] = "$key=\"$value\"";
        }
        return ' ' . implode(' ', $result);
    }
}
