<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt2Criacao;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt2Criacao\AbstractFactory\EditoraA;
use RCS\DesignPatterns\Pt2Criacao\AbstractFactory\EditoraB;

class AbstractFactoryTest extends TestCase
{
    public function testEditoraA(): void
    {
        $abstract_factory = new EditoraA();

        $livro_lang = $abstract_factory->makeLivroLinguagem();
        $this->assertEquals('PHP Essencial', $livro_lang->getTitle());
        $this->assertEquals('Fulano de Tal', $livro_lang->getAuthor());

        $livro_db = $abstract_factory->makeLivroBanco();
        $this->assertEquals('MySql para quem nunca ouviu falar', $livro_db->getTitle());
        $this->assertEquals('João de Tal', $livro_db->getAuthor());
    }

    public function testEditoraB(): void
    {
        $abstract_factory = new EditoraB();

        $livro_lang = $abstract_factory->makeLivroLinguagem();
        $this->assertEquals('Node.js, Javascript no Back-end', $livro_lang->getTitle());
        $this->assertEquals('Erik Alves', $livro_lang->getAuthor());
        $this->assertEquals('200 paginas', $livro_lang->getPages());

        $livro_db = $abstract_factory->makeLivroBanco();
        $this->assertEquals('MongoDb para iniciantes', $livro_db->getTitle());
        $this->assertEquals('Erik Figueiredo', $livro_db->getAuthor());
        $this->assertEquals('300 paginas', $livro_db->getPages());
    }
}
