<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Test\Solid\Html\Unit\ElementTypes;

use PHPUnit\Framework\TestCase;
use Solid\Html\Exceptions\AttributeException;
use Solid\Html\ElementTypes\Img;

class ImgTest extends TestCase
{
    public function testCriaElementoImg(): void
    {
        $img = new Img('img/photo.png');
        $this->assertEquals('<img src="img/photo.png"/>', $img);
    }

    public function testImgAttributeExceptionSrcNotFound(): void
    {
        $this->expectException(AttributeException::class);
        $this->expectExceptionMessage('Attribute src not found');
        new Img();
    }

    public function testImgAttributeExceptionSrcMustBeString(): void
    {
        $this->expectException(AttributeException::class);
        $this->expectExceptionMessage('Attribute src must be string');
        new Img(1);
    }
}
