<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Iterator;

use Iterator;

class MyIterator implements Iterator
{
    private int $position = 0;
    private array $array;

    public function __construct(array $data)
    {
        $this->array = $data;
    }

    public function rewind(): void
    {
        //var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current()
    {
        //var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    public function key(): int
    {
        //var_dump(__METHOD__);
        return $this->position;
    }

    public function next(): void
    {
        //var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid(): bool
    {
        //var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}
