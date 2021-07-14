<?php

namespace Database\Seeders;

use App\Models\Actividad;
use App\Models\Anuncios;
use App\Models\Categoria;
use App\Models\Estatus_User;
use App\Models\Inscripciones;
use App\Models\Instructores;
use App\Models\RedesSociales;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('imgPost');
        Storage::makeDirectory('imgPost');

        $this->call(EstatusUser::class);
        $this->call(UserSeeder::class);
        Actividad::factory(3)->create();
        Inscripciones::factory(10)->create();
        Instructores::factory(4)->create();
        Categoria::factory(5)->create();
        Anuncios::factory(10)->create();
        RedesSociales::factory(10)->create();
    }
}
