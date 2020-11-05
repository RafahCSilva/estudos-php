<?php

namespace Solid\Html;

class Attributes
{
    private $attributes;

    /**
     * Attributes constructor.
     * @param $atrributes
     */
    public function __construct($atrributes)
    {
        $this->attributes = $atrributes;
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
