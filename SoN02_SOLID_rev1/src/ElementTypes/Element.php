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
        $this->validate();
    }

    public function attributes(Attributes $attrs): void
    {
        $this->optional_attrs = (string)$attrs;
    }
}
