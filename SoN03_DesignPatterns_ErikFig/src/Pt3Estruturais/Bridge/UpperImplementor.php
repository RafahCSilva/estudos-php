<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Bridge;

class UpperImplementor implements Implementor
{
    private string $author;
    private string $title;

    public function __construct(string $author, string $title)
    {
        $this->author = $author;
        $this->title = $title;
    }

    public function showAuthor(): string
    {
        return strtoupper($this->author);
    }

    public function showTitle(): string
    {
        return strtoupper($this->title);
    }
}
