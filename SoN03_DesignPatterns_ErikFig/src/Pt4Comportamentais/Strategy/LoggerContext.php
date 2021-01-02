<?php

declare(strict_types=1);

namespace RCS\DesignPatterns\Pt4Comportamentais\Strategy;

class LoggerContext
{
    private Storage $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function setLog($message, $type): void
    {
        $this->storage->persist(compact('message', 'type'));
    }
}
