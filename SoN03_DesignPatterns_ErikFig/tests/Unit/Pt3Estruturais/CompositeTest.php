<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt3Estruturais\Composite\FrameworksCategory;
use RCS\DesignPatterns\Pt3Estruturais\Composite\LaravelCategory;
use RCS\DesignPatterns\Pt3Estruturais\Composite\PHPCategory;
use RCS\DesignPatterns\Pt3Estruturais\Composite\SolidCategory;

class CompositeTest extends TestCase
{
    public function testComposite()
    {
        $php = new PHPCategory();
        $solid = new SolidCategory();
        $framework = new FrameworksCategory();
        $laravel = new LaravelCategory();

        $php->addCategory($solid);
        $php->addCategory($framework);
        $framework->addCategory($laravel);


        $this->assertEquals(<<<YAML
- PHP:
    - SOLID:
    - Frameworks:
        - Laravel:

YAML, $this->renderYAML($php));


        $php->removeCategory($solid);
        $this->assertEquals(<<<YAML
- PHP:
    - Frameworks:
        - Laravel:

YAML, $this->renderYAML($php));
    }

    private function renderYAML($category, $start = ''): string
    {
        $i = -1;
        $ret = $start . '- ' . $category->getName() . ':' . PHP_EOL;
        while (($child = $category->getCategory(++$i)) !== null) {
            $ret .= $this->renderYAML($child, $start . '    ');
        }
        return $ret;
    }
}
