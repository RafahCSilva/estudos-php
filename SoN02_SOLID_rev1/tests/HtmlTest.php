<?php

namespace Solid\Html;

use PHPUnit\Framework\TestCase;

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

}
