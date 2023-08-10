<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','lote', 'agua2','aceite','humedadAceite','grasaAceite','mSecaAceite',
        'harina','humedadHarina', 'grasaHarina', 'mSecaHarina',
        'aguaP2', 'aceiteP', 'solventeP'
    ];

    public function produccions(){
        return $this->belongsTo(Produccion::class);
    }
    
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('granoDeSoya', 'like', '%'.$query.'%')
                ->orWhere('merma', 'like', '%'.$query.'%')
                ->orWhere('lote', 'like', '%'.$query.'%')
                ->orWhere('idTurno', 'like', '%'.$query.'%')
                ->orWhere('fecha', 'like', '%'.$query.'%')
                ->orWhere('humedad', 'like', '%'.$query.'%')
                ->orWhere('bolsas', 'like', '%'.$query.'%')
                ->orWhere('aceite', 'like', '%'.$query.'%');
    }
}
