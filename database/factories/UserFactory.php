<?php

namespace Database\Factories;

use App\Models\Estatus_User;
use App\Models\StatusUser;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        $matri = User::all()->count();
            $matricula =  $matri + 1 ;

        return [
            'name' => $name,
            'edad'=> $this->faker->randomElement([18,19,20,21,22,23,24,25,26,27,28,29,30]),
            'genero'=> $this->faker->randomElement(['H','M']),
            'slug'=> Str::slug($name),
            'descripcion'=>  $this->faker->text(250),
            'matricula' => date('Y').date('m').date('d'). $matricula,
            'email' => $this->faker->unique()->safeEmail(),
            'status_user_id'=>StatusUser::all()->random()->id ,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
