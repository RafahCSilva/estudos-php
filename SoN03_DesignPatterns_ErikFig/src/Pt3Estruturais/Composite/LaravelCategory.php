<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Composite;

class LaravelCategory extends CategoriesAbstract
{
    public function getName(): string
    {
        return 'Laravel';
    }
}
