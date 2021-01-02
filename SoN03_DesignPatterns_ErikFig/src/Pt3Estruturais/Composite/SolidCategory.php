<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Composite;

class SolidCategory extends CategoriesAbstract
{
    public function getName(): string
    {
        return 'SOLID';
    }
}
