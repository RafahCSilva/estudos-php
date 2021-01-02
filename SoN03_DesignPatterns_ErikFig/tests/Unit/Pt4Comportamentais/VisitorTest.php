<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt4Comportamentais\Visitor\LowerCaseVisitor;
use RCS\DesignPatterns\Pt4Comportamentais\Visitor\StringElement;
use RCS\DesignPatterns\Pt4Comportamentais\Visitor\UpperCaseVisitor;

class VisitorTest extends TestCase
{
    public function testVisitor(): void
    {
        $element = new StringElement();
        $element->setValue('Rafael Cardoso');

        $element->accept(new LowerCaseVisitor());
        $this->assertEquals('rafael cardoso',$element->getValue());

        $element->accept(new UpperCaseVisitor());
        $this->assertEquals('RAFAEL CARDOSO',$element->getValue());


        $element = new StringElement();
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid value');
        $element->setValue(2);
    }
}
