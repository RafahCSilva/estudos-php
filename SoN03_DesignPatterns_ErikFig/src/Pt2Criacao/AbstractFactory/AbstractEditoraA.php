<?php

namespace RCS\DesignPatterns1\Pt2Criacao\AbstractFactory;

interface AbstractEditoraA
{
    public function getTitle(): string;

    public function getAuthor(): string;
}