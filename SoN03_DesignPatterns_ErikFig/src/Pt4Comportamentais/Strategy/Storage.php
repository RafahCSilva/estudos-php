<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Strategy;

interface Storage
{
    public function persist(array $data): bool;
}
