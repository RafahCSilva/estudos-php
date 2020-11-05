<?php

namespace Solid\Html;

class Html
{
    public function img(string $src): string
    {
        return "<img src=\"{$src}\"/>";
    }

    public function a(string $href, string $child):string
    {
        return "<a href=\"{$href}\">{$child}</a>";
    }
}
