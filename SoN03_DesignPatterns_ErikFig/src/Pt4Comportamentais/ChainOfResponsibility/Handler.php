<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\ChainOfResponsibility;

abstract class Handler
{
    private ?Handler $successor = null;

    abstract protected function execute();

    public function handlerRequest(): void
    {
        // Execute this responsibility
        $this->execute();

        // call next, if exists
        if ($this->next() !== null) {
            $this->next()->handlerRequest();
        }
    }

    //opcional
    public function successor(Handler $successor): void
    {
        $this->successor = $successor;
    }

    //minha implementação
    public function next(): ?Handler
    {
        return $this->successor;
    }
}
