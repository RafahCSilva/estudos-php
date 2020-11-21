<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Adapter;

class BookAdapter implements BooksInterface
{
    private PHPBook $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function getAuthorAndTitle(): string
    {
        return
            $this->book->getAuthor() .
            ' by ' .
            $this->book->getTitle();
    }
}
