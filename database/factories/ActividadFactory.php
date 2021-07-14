<?php

namespace Database\Factories;

use App\Models\Actividad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActividadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actividad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        return [
            'nombreAct' => $name,
            'descripcion'=>  $this->faker->text(250),
            'costo'=> $this->faker->randomElement([250, 300]),
            'slug' => Str::slug($name)
        ];
    }
}
