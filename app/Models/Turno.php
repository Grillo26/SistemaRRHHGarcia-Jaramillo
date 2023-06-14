<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombreTurno',
        'descripcion'
    ];

    //relacion uno a muchos
    public function produccions(){
        return $this->hasMany('App\Models\Produccion');
    }
    

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nombreTurno', 'like', '%'.$query.'%')
                ->orWhere('descripcion', 'like', '%'.$query.'%');
    }
}
