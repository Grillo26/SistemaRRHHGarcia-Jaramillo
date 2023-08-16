<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'lote', 
        'granoDeSoya', 'humedadGrano', 'grasaGrano', 'mSecaGrano',
        'merma', 'agua',
        'secado', 'humedadSecado', 'grasaSecado', 'mSecaSecado', 
        'mermaP', 'aguaP', 'secadoP', 
        'idTurno', 'fecha', 'bolsas', 'expeller',

        'agua2','aceite','humedadAceite','grasaAceite','mSecaAceite',
        'harina','humedadHarina', 'grasaHarina', 'mSecaHarina',
        'aguaP2', 'aceiteP', 'solventeP'
    ];

    public function turnos(){
        return $this->belongsTo('App\Models\Turno');
    }
    public function costos(){
        return $this->hasOne('App\Models\Costo');
    }


    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('granoDeSoya', 'like', '%'.$query.'%')
                ->orWhere('humedadGrano', 'like', '%'.$query.'%')
                ->orWhere('lote', 'like', '%'.$query.'%')
                ->orWhere('grasaGrano', 'like', '%'.$query.'%')
                ->orWhere('mSecaGrano', 'like', '%'.$query.'%')
                ->orWhere('secado', 'like', '%'.$query.'%')
                ->orWhere('expeller', 'like', '%'.$query.'%')
                ->orWhere('bolsas', 'like', '%'.$query.'%');
    }
}
