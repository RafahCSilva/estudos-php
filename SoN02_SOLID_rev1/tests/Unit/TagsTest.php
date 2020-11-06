<?php

namespace Test\Solid\Html\Unit;

use PHPUnit\Framework\TestCase;
use Solid\Html\Tags;

class TagsTest extends TestCase
{
    public function testCriarTagImgWithSrc()
    {
        $html = new Tags();
        $img = $html->img('img/photo.png');

        $this->assertEquals('<img src="img/photo.png"/>', $img);
    }

    public function testCriarATagWithChild()
    {
        $html = new Tags();
        $img = $html->img('img/photo.png');
        $a = $html->a('https://example.com.br', $img);

        $this->assertEquals('<a href="https://example.com.br"><img src="img/photo.png"/></a>', $a);
    }
}
