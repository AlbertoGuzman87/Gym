<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

     //Relación uno a muchos
     public function anuncio()
     {
         return $this->hasMany(Anuncios::class);
     }
}
