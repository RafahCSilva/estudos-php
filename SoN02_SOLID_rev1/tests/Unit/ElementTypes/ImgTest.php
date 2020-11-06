<?php

namespace Test\Solid\Html\Unit\ElementTypes;

use PHPUnit\Framework\TestCase;
use Solid\Html\ElementTypes\Img;

class ImgTest extends TestCase
{
    public function testCriaElementoImg()
    {
        $img = new Img('img/photo.png');
        $this->assertEquals('<img src="img/photo.png"/>', $img);
    }
}
