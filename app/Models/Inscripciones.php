<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    use HasFactory;

        //Relacion uno a muchos inversa
        public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function actividad()
        {
            return $this->belongsTo(Actividad::class);
        }
}
