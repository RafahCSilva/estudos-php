<?php

namespace Test\Solid\Html\Unit;

use PHPUnit\Framework\TestCase;
use Solid\Html\Attributes;

class AttributesTest extends TestCase
{
    public function testCriaAttributosHtmlParaElementos()
    {
        $attributes = new Attributes([
            'class' => 'btn btn-default',
            'data-modal' => '#login',
            'id' => 'login'
        ]);

        $this->assertEquals(
            ' class="btn btn-default" data-modal="#login" id="login"',
            $attributes
        );
    }
}
