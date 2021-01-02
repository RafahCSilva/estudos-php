<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt2Criacao\AbstractFactory;

class EditoraA implements AbstractFactory
{
    private AbstractEditoraA $linguagem;
    private AbstractEditoraA $banco;

    public function __construct()
    {
        $this->linguagem = new LivroPHP();
        $this->banco = new LivroMysql();
    }

    public function makeLivroLinguagem()
    {
        $this->linguagem->setTitle('PHP Essencial');
        $this->linguagem->setAuthor('Fulano de Tal');
        return $this->linguagem;
    }

    public function makeLivroBanco()
    {
        return $this->banco;
    }
}
