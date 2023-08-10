<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'soya',
        'aceite',
        'gasLicuado',
        'personal',
        'electricidad',
        'bolsas',
        'costo_total',
        'produccion_id',
    ];

    public function produccion()
    {
        return $this->belongsTo(Produccion::class);
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('id', 'like', '%'.$query.'%')
                ->orWhere('aceite', 'like', '%'.$query.'%')
                ->orWhere('soya', 'like', '%'.$query.'%')
                ->orWhere('gasLicuado', 'like', '%'.$query.'%')
                ->orWhere('personal', 'like', '%'.$query.'%')
                ->orWhere('electricidad', 'like', '%'.$query.'%')
                ->orWhere('bolsas', 'like', '%'.$query.'%')
                ->orWhere('costo_total', 'like', '%'.$query.'%');
    }
}
