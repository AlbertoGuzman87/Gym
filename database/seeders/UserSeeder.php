<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name='Juan Alberto Guzmán Gómez';
        User::create([
            'name' => $name,
            'edad' => '20',
            'genero'=> 'H',
            'slug'=> Str::slug($name),
            'descripcion'=>'Ing. Gestión y Desarrollo de Software.',
            'matricula' => date('Y').date('m').date('d').'1',
            'email' => 'juanalbertoguzman87@gmail.com',
            'status_user_id' => 1,
            'password' => bcrypt('estrella234'),
        ]);

        for ($i = 0; $i <= 10; $i++) {
            \App\Models\User::factory(1)->create();
        }

    }
}
