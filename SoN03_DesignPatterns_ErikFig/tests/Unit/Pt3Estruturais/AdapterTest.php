<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt3Estruturais\Adapter\BookAdapter;
use RCS\DesignPatterns\Pt3Estruturais\Adapter\PHPBook;
use RCS\DesignPatterns\Pt3Estruturais\Adapter\RenderBook;

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
