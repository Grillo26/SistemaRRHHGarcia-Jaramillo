<?php

namespace App\Http\Controllers;
use App\Models\Producción;
use App\Models\Costo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class CostoController extends Controller
{
    
    public function index_view ()
    {
        return view('pages.costo.costo-data', [
        'produccion' => Produccion::class,
        'costo' => Costo::class
        ]);
    }
    
}
