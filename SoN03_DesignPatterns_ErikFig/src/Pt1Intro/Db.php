<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt1Intro;

use PDO;
use PDOStatement;
use RCS\DesignPatterns1\Pt1Intro\Builder\DirectorInterface;

class Db
{
    private PDO $pdo;
    private DirectorInterface $director;
    private string $sql;

    /**
     * Db constructor.
     * @param $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function setDirector(DirectorInterface $director): void
    {
        $this->director = $director;
    }

    public function getAll(): Db
    {
        $this->sql = $this->director->getSqlAll();
        return $this;
    }

    /**
     * @return bool|PDOStatement
     */
    public function execute()
    {
        return $this
            ->pdo
            ->query($this->sql);
    }
}
