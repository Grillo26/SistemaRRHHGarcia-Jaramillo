<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'codigo_producto',
        'nombre_producto',
        'unidad_idUnidad',
        'grupo_idGrupo',
        'cuenta_idCuenta'
    ];

    public function unidads(){
        return $this->belongsTo('App\Models\Turno');
    }
}
