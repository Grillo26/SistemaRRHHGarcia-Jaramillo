<?php

namespace App\Http\Controllers;
use App\Models\Produccion;
use App\Models\Rendimiento;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    public function index_view ()
    {
        return view('pages.produccion.produccion-data', [
        'produccion' => Produccion::class,
        'rendimiento' => Rendimiento::class
        ]);
    }
}
