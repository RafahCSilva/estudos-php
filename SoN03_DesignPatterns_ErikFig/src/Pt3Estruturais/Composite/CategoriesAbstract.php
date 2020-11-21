<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Composite;

abstract class CategoriesAbstract
{
    protected array $categories = [];

    abstract public function getName(): string;

    public function addCategory(CategoriesAbstract $category): void
    {
        $this->categories[] = $category;
    }

    public function removeCategory(CategoriesAbstract $category): void
    {
        $this->categories = array_values(
            array_filter(
                $this->categories,
                function ($item) use ($category) {
                    //xdebug_var_dump($item->getName(), $category->getName(), $item->getName() !== $category->getName());
                    return $item->getName() !== $category->getName();
                }
            )
        );
        //xdebug_var_dump($this->categories);
    }

    public function getCategory(int $key)
    {
        return $this->categories[$key] ?? null;
    }
}
