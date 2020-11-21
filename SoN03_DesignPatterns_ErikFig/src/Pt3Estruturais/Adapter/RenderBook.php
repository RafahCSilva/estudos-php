<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Adapter;

class RenderBook
{
    private BooksInterface $books;


    public function __construct(BooksInterface $books)
    {
        $this->books = $books;
    }

    public function renderTitleAndName(): string
    {
        return $this->books->getAuthorAndTitle();
    }

}
