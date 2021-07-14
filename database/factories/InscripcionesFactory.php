<?php

namespace Database\Factories;

use App\Models\Actividad;
use App\Models\Inscripciones;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscripcionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inscripciones::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

    $timestamp = Rand( strtotime("Jul 01 2021"), strtotime("Jul 13 2021") );
    $random_Date = date("d.m.Y", $timestamp );
    $fecha=Carbon::parse($random_Date);
        return [
            'user_id'      =>  User::all()->random()->id,
            'actividad_id' =>  Actividad::all()->random()->id,
            'adicional'    =>  $this->faker->randomElement([50, 110]),
            'total'        =>  $this->faker->randomElement([250, 310]),
            'estatus'      =>  $this->faker->randomElement([1, 2]),
            'fechaI'       =>  $random_Date,
            'fechaF'       =>  $fecha->addMonth()->calendar(),

        ];
    }
}
