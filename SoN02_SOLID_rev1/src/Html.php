<?php

namespace Solid\Html;

class Html
{
    public function img(string $src): string
    {
        return "<img src=\"{$src}\"/>";
    }

    public function a(string $href, string $child)
    {
        $element = new class {
            private $attributes;

            public function attribute(array $attributes)
            {
                $result = [];
                foreach ($attributes as $key => $value) {
                    $result[] = "$key=\"$value\"";
                }
                $this->attributes = ' ' . implode(' ', $result);
            }

            public function __toString()
            {
                return "<a href=\"{$this->href}\"{$this->attributes}>{$this->child}</a>";
            }
        };

        $element->href = $href;
        $element->child = $child;

        return $element;
    }
}
