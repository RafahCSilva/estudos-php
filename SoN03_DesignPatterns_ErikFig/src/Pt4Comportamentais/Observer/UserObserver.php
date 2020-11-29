<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Observer;

use RuntimeException;
use SplObserver;
use SplSubject;

class UserObserver implements SplObserver
{
    //private array $changedUsers = [];
    private array $emails = [];

    /**
     * @param SplSubject|User $subject
     * @throws RuntimeException
     */
    public function update(SplSubject $subject): void
    {
        //$this->changedUsers[] = clone $subject;

        if (in_array($subject->getEmail(), $this->emails, true)) {
            throw new RuntimeException("Duplicated value {$subject->getEmail()}");
        }
        $this->emails[] = $subject->getEmail();
    }

    public function getChangedEmails(): array
    {
        return $this->emails;
    }
}
