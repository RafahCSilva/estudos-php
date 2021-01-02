<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\AbstractFactory;

class LivroPHP implements AbstractEditoraA
{
    private ?string $title;
    private ?string $author;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }
}
