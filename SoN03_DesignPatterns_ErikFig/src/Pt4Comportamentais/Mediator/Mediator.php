<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Mediator;

class Mediator implements MediatorInterface
{
    private Colleague $client;
    private Colleague $server;
    private Colleague $database;

    public function __construct(ClientColleague $client, ServerColleague $server, DatabaseColleague $database)
    {
        $this->client = $client->setMediator($this);
        $this->server = $server->setMediator($this);
        $this->database = $database->setMediator($this);
    }

    public function sendResult($content): void
    {
        $this->client->output($content);
    }

    public function makeRequest(): void
    {
        $this->server->process();
    }

    public function queryDb(): string
    {
        return $this->database->findData();
    }
}
