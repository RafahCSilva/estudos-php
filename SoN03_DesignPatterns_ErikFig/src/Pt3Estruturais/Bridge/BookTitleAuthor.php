<?php

namespace RCS\DesignPatterns1\Pt3Estruturais\Bridge;

class BookTitleAuthor extends BridgeBook
{
    public function get(): string
    {
        return $this->implementor->showTitle() . ' ' . $this->implementor->showAuthor();
    }
}
