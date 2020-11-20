<?php

namespace RCS\DesignPatterns1\Pt2Criacao\AbstractFactory;

interface AbstractFactory
{
    public function makeLivroLinguagem();

    public function makeLivroBanco();
}
