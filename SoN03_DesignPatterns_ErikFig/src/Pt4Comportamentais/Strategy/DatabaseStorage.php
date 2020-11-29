<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Strategy;

class DatabaseStorage implements Storage
{
    public function persist(array $data): bool
    {
        echo 'salvo no banco de dados';
        return true;
    }
}
