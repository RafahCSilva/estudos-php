<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\AbstractFactory;

class LivroMongoDb implements AbstractEditoraB
{
    public function getTitle(): string
    {
        return 'MongoDb para iniciantes';
    }

    public function getAuthor(): string
    {
        return 'Erik Figueiredo';
    }

    public function getPages(): string
    {
        return '300 paginas';
    }

}
