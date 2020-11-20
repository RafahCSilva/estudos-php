<?php

namespace RCS\DesignPatterns1\Pt2Criacao\AbstractFactory;

interface AbstractEditoraB
{
    public function getTitle(): string;

    public function getAuthor(): string;

    public function getPages(): string;
}
