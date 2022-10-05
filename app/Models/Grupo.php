<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre_grupo',
        'grupo',
        'cuenta_a',
        'partida_a'
    ];

     //relacion uno a muchos
     public function productos(){
        return $this->hasMany('App\Models\Producto');
    }
}
