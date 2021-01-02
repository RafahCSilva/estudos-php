<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Observer;

use RuntimeException;

class User extends Entity
{
    private string $email;

    /**
     * @param string $email
     * @throws RuntimeException
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
        $this->notify();
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
