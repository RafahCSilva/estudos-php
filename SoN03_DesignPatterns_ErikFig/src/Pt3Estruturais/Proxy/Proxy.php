<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\Proxy;

class Proxy implements PersonInterface
{
    private int $counter = 0;
    private ?PersonInterface $person = null;
    private string $name;
    private int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function makePerson(): PersonInterface
    {
        if ($this->person === null) {
            //xdebug_var_dump('estou instanciando a classe agora');
            $this->person = new Person($this->name, $this->age);
        }
        $this->counter++;
        return $this->person;
    }

    public function getCounter(): int
    {
        return $this->counter;
    }

    public function getName(): string
    {
        return $this->makePerson()->getName();
    }


    public function getAge(): int
    {
        return $this->makePerson()->getAge();
    }
}
