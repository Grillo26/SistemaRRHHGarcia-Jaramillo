<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'idProduccion',
        'soya',
        'merma',
        'agua',
        'soyaFinal'
    ];

    public function produccions(){
        return $this->belongsTo('App\Models\Produccion');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('id', 'like', '%'.$query.'%')
                ->orWhere('idProduccion', 'like', '%'.$query.'%')
                ->orWhere('soya', 'like', '%'.$query.'%')
                ->orWhere('merma', 'like', '%'.$query.'%')
                ->orWhere('agua', 'like', '%'.$query.'%')
                ->orWhere('soyaFinal', 'like', '%'.$query.'%');
    }
}
