<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'lote',
        'granoDeSoya',
        'merma',
        'idTurno',
        'fecha',
        'humedad',
        'bolsas',
        'expeller',
        'aceite',
        'grasas',
        'luz'
    ];

    public function turnos(){
        return $this->belongsTo('App\Models\Turno');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('granoDeSoya', 'like', '%'.$query.'%')
                ->orWhere('merma', 'like', '%'.$query.'%')
                ->orWhere('idTurno', 'like', '%'.$query.'%')
                ->orWhere('fecha', 'like', '%'.$query.'%')
                ->orWhere('humedad', 'like', '%'.$query.'%')
                ->orWhere('bolsas', 'like', '%'.$query.'%')
                ->orWhere('aceite', 'like', '%'.$query.'%');
    }
}
