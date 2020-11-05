<?php
// Dependency Inversion

class Database
{
    /** @var \PDO */
    private $driver;

    public function __construct(\PDO $pdo)
    {
        //$this->driver = new \PDO('url', 'user', 'pass');
        $this->driver = $pdo;
    }
}

$pdo = new \PDO('url', 'user', 'pass');
new Database($pdo);
