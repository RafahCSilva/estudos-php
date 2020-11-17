<?php

namespace RCS\AbstractFactory;

class EditoraB implements AbstractFactory
{
    private AbstractEditoraB $linguagem;
    private AbstractEditoraB $banco;

    public function __construct()
    {
        $this->linguagem = new LivroNode();
        $this->banco = new LivroMongoDb();
    }

    public function makeLivroLinguagem()
    {
        return $this->linguagem;
    }

    public function makeLivroBanco()
    {
        return $this->banco;
    }
}
