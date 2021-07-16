<?php

namespace Database\Seeders;

use App\Models\StatusUser as ModelsStatusUser;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class StatusUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsStatusUser::create([
            'nombre'     => 'Activo',
            'descripcion'=> 'El usuario pude entrar al sistema.',
            'color'      => 'bg-info',
            'slug'       => Str::slug('Estatus Activo'),
        ]);

        ModelsStatusUser::create([
            'nombre'     => 'En revisión',
            'descripcion'=> 'El usuario está en espera.',
            'color'      => 'bg-warning',
            'slug'       => Str::slug('Estatus En Revisión'),
        ]);

        ModelsStatusUser::create([
            'nombre'     => 'Rechazada',
            'descripcion'=> 'El usuario Fue Rechazado.',
            'color'      => 'bg-danger',
            'slug'       => Str::slug('Estatus Rechazada'),
        ]);

        ModelsStatusUser::create([
            'nombre'     => 'Boqueado',
            'descripcion'=> 'El Usuario Fue Bloqueado Por Faltas Administrativas.',
            'color'      => 'bg-dark',
            'slug'       => Str::slug('Estatus Bloqueado'),
        ]);

    }
}
