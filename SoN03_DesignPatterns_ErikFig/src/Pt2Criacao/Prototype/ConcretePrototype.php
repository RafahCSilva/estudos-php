<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\Prototype;

class ConcretePrototype
{
    public string $title;
    public string $author;
    public int $counter = 0;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function __clone()
    {
        $this->counter++;
        if ($this->counter > 1) {
            throw new ConcretePrototypeException("Você está indo longe de mais meu filho...");
        }
    }
}
