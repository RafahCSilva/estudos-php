<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\AbstractFactory;

interface AbstractEditoraA
{
    public function getTitle(): string;

    public function getAuthor(): string;
}
