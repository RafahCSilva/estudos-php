<?php

namespace Solid\Html;

class Tags
{
    public function img(string $src): string
    {
        return "<img src=\"{$src}\"/>";
    }

    public function a(string $href, string $child)
    {
        return "<a href=\"{$href}\">{$child}</a>";
    }
}
