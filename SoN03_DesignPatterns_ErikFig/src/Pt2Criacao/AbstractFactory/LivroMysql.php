<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt2Criacao\AbstractFactory;

class LivroMysql implements AbstractEditoraA
{
    public function getTitle(): string
    {
        return 'MySql para quem nunca ouviu falar';
    }

    public function getAuthor(): string
    {
        return 'João de Tal';
    }
}
