<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Test\Solid\Html\Unit;

use PHPUnit\Framework\TestCase;
use Solid\Html\Attributes;
use Solid\Html\HtmlBuilder;

class HtmlBuilderTest extends TestCase
{
    public function testCriarTagImgWithSrc(): void
    {
        $html = new HtmlBuilder();
        $img = $html->img('img/photo.png');
        $this->assertEquals('<img src="img/photo.png"/>', $img);
    }

    public function testCriarTagImgWithSrcStatic(): void
    {
        $img = HtmlBuilder::img('img/photo.png');
        $this->assertEquals('<img src="img/photo.png"/>', $img);
    }

    public function testCriarATagWithChild(): void
    {
        $html = new HtmlBuilder();
        $img = $html->img('img/photo.png');
        $a = $html->a('https://example.com.br', $img);

        $this->assertEquals('<a href="https://example.com.br"><img src="img/photo.png"/></a>', $a);
    }

    public function testCriarTagAWithClassAndId(): void
    {
        $html = new HtmlBuilder();
        $a = $html->a('https://example.com.br', 'Meu Site');
        $attrs = new Attributes([
            'class' => 'btn btn-default'
        ]);
        $a->attributes((string)$attrs);
        $this->assertEquals('<a href="https://example.com.br" class="btn btn-default">Meu Site</a>', $a);
    }
}
