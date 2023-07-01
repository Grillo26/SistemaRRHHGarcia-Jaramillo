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

    public function pdf(){
        $produccion = Produccion::get();
        $pdf = Pdf::loadView('pages.produccion.pdf', compact('produccion'));
        return $pdf->stream();
    }
}
