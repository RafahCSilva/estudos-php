<?php

namespace Solid\Html;

use Solid\Html\ElementTypes\A;
use Solid\Html\ElementTypes\Img;

/**
 * Class HtmlBuilder
 * @package Solid\Html
 * @method A a(string $href, string $child)
 * @method Img img(string $src)
 */
class HtmlBuilder
{
    public function __call($name, $arguments)
    {
        return self::createElement($name, $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::createElement($name, $arguments);
    }

    protected static function createElement(string $type, array $arguments)
    {
        return (new \ReflectionClass(
            '\\Solid\\Html\\ElementTypes\\' . ucfirst($type)
        ))->newInstanceArgs($arguments);
    }
}
