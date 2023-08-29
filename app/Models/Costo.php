<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'precioGasLicuado', 'precioPersonal', 'precioElectricidad', 'precioBolsas', 'precioAceite',
    ];

    public function produccion()
    {
        return $this->belongsTo(Produccion::class);
    }
    

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('id', 'like', '%'.$query.'%')
                ->orWhere('precioGasLicuado', 'like', '%'.$query.'%')
                ->orWhere('precioPersonal', 'like', '%'.$query.'%');
                
    }
}
