<?php

namespace Test\Solid\Html\Unit;

use PHPUnit\Framework\TestCase;
use Solid\Html\Html;

class HtmlTest extends TestCase
{
    public function testCriarTagImgWithSrc()
    {
        $html = new Html();
        $img = $html->img('img/photo.png');

        $this->assertEquals('<img src="img/photo.png"/>', $img);
    }

    public function testCriarATagWithChild()
    {
        $html = new Html();
        $img = $html->img('img/photo.png');
        $a = $html->a('https://example.com.br', $img);

        $this->assertEquals('<a href="https://example.com.br"><img src="img/photo.png"/></a>', $a);
    }

    public function testCriarTagAWithClassAndId()
    {
        $html = new Html();
        $a = $html->a('https://example.com.br', 'Meu Site');
        $a->attribute([
            'class' => 'btn btn-default'
        ]);
        $this->assertEquals('<a href="https://example.com.br" class="btn btn-default">Meu Site</a>', (string)$a);
    }

}
