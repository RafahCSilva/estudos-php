<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Test\Solid\Html\Unit\ElementTypes;

use PHPUnit\Framework\TestCase;
use Solid\Html\Attributes;
use Solid\Html\ElementTypes\A;
use Solid\Html\ElementTypes\Img;
use Solid\Html\Exceptions\AttributeException;

class ATest extends TestCase
{
    public function testCriaElementoAComHrefETexto(): void
    {
        $a = new A('https://example.com.br', 'meu site');
        $this->assertEquals('<a href="https://example.com.br">meu site</a>', $a);
    }

    public function testCriaElementoAComHrefETextoEAtributos(): void
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

    public function testAAttributeExceptionHrefNotFound(): void
    {
        $this->expectException(AttributeException::class);
        $this->expectExceptionMessage('Attribute href not found');
        new A();
    }

    public function testAAttributeExceptionHrefMustBeString(): void
    {
        $this->expectException(AttributeException::class);
        $this->expectExceptionMessage('Attribute href must be string');
        new A(1);
    }

    public function testAAttributeExceptionChildNotFound(): void
    {
        $this->expectException(AttributeException::class);
        $this->expectExceptionMessage('Attribute child not found');
        new A('#');
    }

    public function testAAttributeExceptionChildMustBeString(): void
    {
        $this->expectException(AttributeException::class);
        $this->expectExceptionMessage('Attribute child must be string');
        new A('#', 1);
    }
}
