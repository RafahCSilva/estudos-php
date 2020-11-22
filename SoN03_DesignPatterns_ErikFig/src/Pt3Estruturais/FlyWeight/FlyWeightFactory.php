<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt3Estruturais\FlyWeight;

class FlyWeightFactory
{
    private array $soldiers = [];

    public function getSoldier(int $key): Soldier
    {
        if (empty($this->soldiers[$key])) {
            $this->soldiers[$key] = $this->makeSoldier();
        }
        return $this->soldiers[$key];
    }

    private function makeSoldier(): Soldier
    {
        $names = [
            'Livius Aleksander',
            'Mason Hugubert',
            'Pat Longinus',
            'Tiborc Nikhil',
            'Quirino Anand',
        ];
        $name = array_rand($names, 1);

        $ages = [
            19,
            21,
            27,
            32,
            38,
        ];
        $age = array_rand($ages, 1);

        return new Soldier( $names[$name],  $ages[$age]);
    }
}
