<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt4Comportamentais\TemplateMethod\DiscountOrder;
use RCS\DesignPatterns1\Pt4Comportamentais\TemplateMethod\IncreaseOrder;

class TemplateMethodTest extends TestCase
{
    public function testTemplateMethod(): void
    {
        $value = 190;
        $changeValue = 20;

        // 190 + (40*1) - 20 = 210
        $result = (new DiscountOrder())->finalValue($value, 40, $changeValue);
        $this->assertEquals('210,00',$result);

        // 190 + (40*1) + 20 = 250
        $result = (new IncreaseOrder())->finalValue($value, 40, $changeValue);
        $this->assertEquals('250,00',$result);
    }
}
