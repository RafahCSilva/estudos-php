<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Strategy;

class LocalStorage implements Storage
{
    private string $dir;

    public function __construct(string $dir)
    {
        $this->dir = $dir;
    }

    public function persist(array $data): bool
    {
        echo 'salvo no diretório ' . $this->dir;
        return true;
    }
}
