<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Mediator;

abstract class Colleague
{
    protected MediatorInterface $mediator;

    public function setMediator(MediatorInterface $mediator): self
    {
        $this->mediator = $mediator;
        return $this;
    }
}
