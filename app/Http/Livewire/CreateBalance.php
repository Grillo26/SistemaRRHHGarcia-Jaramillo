<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class createBalance extends Component
{
    public $produccion;
    public $produccionId;
    public $action;
    public $button;
    public $secado, $agua2, $aguaP2, $aceite, $aceiteP, $harina, $solventeP, $fecha, $lote, $hora;
    public $imagePath;

    public function mount (){
        if (!$this->produccion && $this->produccionId) {
                $this->produccion = Produccion::find($this->produccionId);
        }

        $this->button = create_button($this->action, "Produccion");

    }

    
    public function render(){
        $balance = Produccion::find($this->produccionId);

        //Extraemos los datos de la tabla produccion y los asignamos en la variable balances, de ahí los derivamos en sus variables respectivas   
        $this->fecha = $balance->fecha;
        $this->lote = $balance->lote;
        $this->secado = $balance->secado;
        $this->agua2 = $balance->agua2;
        $this->aguaP2 = $balance->aguaP2;
        $this->aceite = $balance->aceite;
        $this->aceiteP = $balance->aceiteP;
        $this->harina = $balance->harina;
        $this->solventeP = $balance->solventeP;

        $this->hora = Carbon::parse($balance->created_at)->format('H:i:s');
    
        return view('livewire.create-balance');
    } 
    public function obtenerDatos()
{
    $producciones = Produccion::all();

    foreach ($producciones as $produccion) {
        // Formatear la fecha y obtener solo la hora
        $produccion->hora_creacion = Carbon::parse($produccion->created_at)->format('H:i:s');
    }

    return view('livewire.tu-vista', compact('producciones'));
}

    public function generatePdf($produccionId){

        $this->imagePath = public_path('img/logo.png');
        $exports = Produccion::find($produccionId);
       

        $pdf = Pdf::loadView('pages.produccion.pdf', compact('exports'),['imagePath' => $this->imagePath]);
        return $pdf->setPaper('A4')->stream('balance.pdf');
    }
}
