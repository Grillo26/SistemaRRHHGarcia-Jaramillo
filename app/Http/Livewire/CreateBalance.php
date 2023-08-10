<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use App\Models\Balance;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class createBalance extends Component
{
    public $produccion;
    public $produccionId;
    public $balance;
    public $balanceId;
    public $action;
    public $button;
    public $imagePath; 
    public $loteId;
 
    public function mount (){
        if (!$this->balance && $this->balanceId) {
                $this->balance = Balance::find($this->balanceId);
        }

        $this->button = create_button($this->action, "Balance");

    }


    
    public function render(){
        $balance = Balance::find($this->balanceId);

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
