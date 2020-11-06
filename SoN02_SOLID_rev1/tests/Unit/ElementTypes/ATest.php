<?php

namespace Test\Solid\Html\Unit\ElementTypes;

use PHPUnit\Framework\TestCase;
use Solid\Html\Attributes;
use Solid\Html\ElementTypes\A;
use Solid\Html\ElementTypes\Img;

class ATest extends TestCase
{
    public function testCriaElementoAComHrefETexto()
    {
        $a = new A('https://example.com.br', 'meu site');
        $this->assertEquals('<a href="https://example.com.br">meu site</a>', $a);
    }

    public function testCriaElementoAComHrefETextoEAtributos()
    {
        $attr = new Attributes([
            'class' => 'btn btn-default',
            'data-modal' => '#login',
            'id' => 'login'
        ]);
        $a = new A('#', 'Login');
        $a->attributes($attr);
        $this->assertEquals('<a href="#" class="btn btn-default" data-modal="#login" id="login">Login</a>', $a);
    }
}
