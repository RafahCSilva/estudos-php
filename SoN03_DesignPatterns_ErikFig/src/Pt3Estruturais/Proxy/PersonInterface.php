<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Proxy;

interface PersonInterface
{
    public function __construct(string $name, int $age);

    public function getName(): string;

    public function getAge(): int;
}
