<?php

namespace App\Http\Controllers;
use App\Models\Produccion;
use App\Models\Turno;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ProduccionController extends Controller
{
    
    public function index_view ()
    {
        return view('pages.produccion.produccion-data', [
        'turno'=>Turno::class,
        'produccion' => Produccion::class
        ]);
    }
    
}
