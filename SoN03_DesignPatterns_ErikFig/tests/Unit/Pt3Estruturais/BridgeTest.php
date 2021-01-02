<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt3Estruturais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt3Estruturais\Bridge\BookAuthorTitle;
use RCS\DesignPatterns\Pt3Estruturais\Bridge\BookTitleAuthor;
use RCS\DesignPatterns\Pt3Estruturais\Bridge\LowerImplementor;
use RCS\DesignPatterns\Pt3Estruturais\Bridge\UpperImplementor;

class BridgeTest extends TestCase
{
    public function testBridge(): void
    {
        $example1 = new BookAuthorTitle('Erik Figueiredo', 'Livro PHP 7.0', LowerImplementor::class);
        $this->assertEquals('erik figueiredo livro php 7.0', $example1->get());

        $example1 = new BookAuthorTitle('Erik Figueiredo', 'Livro PHP 7.0', UpperImplementor::class);
        $this->assertEquals('ERIK FIGUEIREDO LIVRO PHP 7.0', $example1->get());

        $example1 = new BookTitleAuthor('Erik Figueiredo', 'Livro PHP 7.0', LowerImplementor::class);
        $this->assertEquals('livro php 7.0 erik figueiredo', $example1->get());

        $example1 = new BookTitleAuthor('Erik Figueiredo', 'Livro PHP 7.0', UpperImplementor::class);
        $this->assertEquals('LIVRO PHP 7.0 ERIK FIGUEIREDO', $example1->get());
    }
}
