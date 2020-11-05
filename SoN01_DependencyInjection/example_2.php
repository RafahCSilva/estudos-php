<?php
// Dependency Inversion

interface DatabaseDriver
{
    public function configure(array $config);

    public function connect();
}

class PdoDriver implements DatabaseDriver
{
    /** @var array */
    private $config;

    public function configure(array $config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        $pdo = new \PDO($this->config['dsn'], $this->config['user'], $this->config['passwd']);
    }
}

class MongoDbDriver implements DatabaseDriver
{
    /** @var array */
    private $config;

    public function configure(array $config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        $mongo = new \Mongo($this->config['server']);
    }
}

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

$pdo_driver = new PdoDriver();
$pdo_driver->configure([]);
$pdo = new Database($pdo_driver);

$mongo_driver = new MongoDbDriver();
$mongo_driver->configure([]);
$mongo = new Database($mongo_driver);
$js = <<<JS
const Resources = {
    ano1: {
        step1: {
            mobile: imgYear2Step1Mobile,
            desktop: imgYear2Step1
        }
    }
};
img.src = Resources.ano1.step1.mobile;
img.src = Resources[ano][step][isMobile?'mobile':'desktop'];
JS;
