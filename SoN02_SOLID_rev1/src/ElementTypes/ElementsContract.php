<?php

namespace Solid\Html\ElementTypes;

interface ElementsContract
{
    public function validate();

    public function __toString(): string;
}
