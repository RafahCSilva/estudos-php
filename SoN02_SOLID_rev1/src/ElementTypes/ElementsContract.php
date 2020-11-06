<?php

namespace Solid\Html\ElementTypes;

interface ElementsContract
{
    public function validate():void;

    public function __toString(): string;
}
