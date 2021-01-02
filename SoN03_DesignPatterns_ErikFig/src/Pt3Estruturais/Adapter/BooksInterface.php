<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Adapter;

interface BooksInterface
{
    public function getAuthorAndTitle(): string;
}
