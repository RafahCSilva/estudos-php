<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt3Estruturais\Composite;

class FrameworksCategory extends CategoriesAbstract
{
    public function getName(): string
    {
        return 'Frameworks';
    }
}
