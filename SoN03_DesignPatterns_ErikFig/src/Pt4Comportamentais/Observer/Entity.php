<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Observer;

use RuntimeException;
use SplObjectStorage;
use SplObserver;
use SplSubject;

abstract class Entity implements SplSubject
{
    private SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * @throws RuntimeException
     */
    public function notify(): void
    {
        // foreach da algum caso no CoveragePaths que nao sei cobrir
        // foreach ($this->observers as $observer) {
        //     $observer->update($this);
        // }

        $this->observers->rewind();
        while ($this->observers->valid()) {
            /** @var UserObserver $observer */
            $observer = $this->observers->current();
            $observer->update($this);

            $this->observers->next();
        }
    }
}
