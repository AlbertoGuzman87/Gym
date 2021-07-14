<?php

namespace Database\Factories;

use App\Models\RedesSociales;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedesSocialesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RedesSociales::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user=User::all()->random()->id;
        return [
            'facebook' => $this->faker->text(15),
            'instagram' => $this->faker->text(15),
            'twiter' => $this->faker->text(15),
            'user_id' => $user,
        ];
    }
}
