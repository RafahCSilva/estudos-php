<?php

namespace Solid\Html\ElementTypes;

use Solid\Html\Attributes;

abstract class Element implements ElementsContract
{
    /** @var array */
    protected $attrs;
    /** @var string */
    protected $optional_attrs = '';

    public function __construct()
    {
        $this->attrs = func_get_args();
        foreach ($this->attrs as &$attr) {
            if (is_a($attr, ElementsContract::class)) {
                $attr = (string)$attr;
            }
        }
        $this->validate();
    }

    public function attributes(string $attrs): void
    {
        $this->optional_attrs = $attrs;
    }
}
