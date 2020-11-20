<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns1\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns1\Pt3Estruturais\Adapter\BookAdapter;
use RCS\DesignPatterns1\Pt3Estruturais\Adapter\PHPBook;
use RCS\DesignPatterns1\Pt3Estruturais\Adapter\RenderBook;

class AdapterTest extends TestCase
{
    public function testAdapter(): void
    {
        $book = new PHPBook('Livro de PHP 7.0', 'Erik Figueiredo');
        $adapter = new BookAdapter($book);
        $render = new RenderBook($adapter);

        $this->assertEquals('Livro de PHP 7.0 by Erik Figueiredo', $render->renderTitleAndName());
    }
}
