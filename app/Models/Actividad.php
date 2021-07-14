<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

            //Relación uno a muchos
            public function inscripciones()
            {
                return $this->hasMany(Inscripciones::class);
            }
}
