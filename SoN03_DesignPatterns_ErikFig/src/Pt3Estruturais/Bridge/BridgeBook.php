<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Bridge;

abstract class BridgeBook
{
    protected Implementor $implementor;

    public function __construct(string $author, string $title, string $implementor)
    {
        $this->implementor = new $implementor($author, $title);
        //if (is_a($this->implementor, 'SON\Bridge\Implementor'))
    }

    abstract public function get(): string;
}
