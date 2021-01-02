<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Bridge;

class BookTitleAuthor extends BridgeBook
{
    public function get(): string
    {
        return $this->implementor->showTitle() . ' ' . $this->implementor->showAuthor();
    }
}
