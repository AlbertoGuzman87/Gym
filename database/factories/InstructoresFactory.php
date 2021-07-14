<?php

namespace Database\Factories;

use App\Models\Instructores;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instructores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'      =>  User::all()->random()->id,
            'descripcion'  =>  $this->faker->text(150),
            'edad'         => $this->faker->randomElement(['21','16','32']),
            'especialidad' => $this->faker->text(50),

        ];
    }
}
