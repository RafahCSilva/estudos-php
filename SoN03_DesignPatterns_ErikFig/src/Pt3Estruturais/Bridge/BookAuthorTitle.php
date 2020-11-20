<?php

namespace RCS\DesignPatterns1\Pt3Estruturais\Bridge;

class BookAuthorTitle extends BridgeBook
{
    public function get(): string
    {
        return $this->implementor->showAuthor() . ' ' . $this->implementor->showTitle();
    }
}
