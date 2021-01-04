<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'           => $this->faker->name,
            'agency'          => $this->faker->randomNumber(4),
            'account_number'  => $this->faker->randomNumber(5),
            'balance'         => $this->faker->randomFloat(2, 100, 1000),
            'balance_initial' => $this->faker->randomFloat(2, 10, 100),
            'bank_id'         => $this->faker->numberBetween(0, 10),
            'bank_image'      => Str::random(10).'.jpg',
        ];
    }
}
