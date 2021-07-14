<?php

namespace Database\Factories;

use App\Models\Anuncios;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnunciosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anuncios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [
            'titulo' => $name,
            'slug' => Str::slug($name),
            'imagen' => 'imgPost/' . $this->faker->image('public/storage/imgPost', 640, 480, null, false),
            'extract' => $this->faker->text(250),
            'contenido' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1, 2]),
            'relevancia' => $this->faker->randomElement([1, 2, 3]),
            //Del modelo category taer todo y escoge uno al azar y toma su id
            'categoria_id' => Categoria::all()->random()->id,
            //Del modelo user taer todo y escoge uno al azar y toma su id
            'user_id' => User::all()->random()->id,


        ];
    }
}
