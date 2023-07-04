<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use Barryvdh\DomPDF\Facade\Pdf;

class createBalance extends Component
{
    public $produccion;
    public $produccionId;
    public $action;
    public $button;
    public $turno;
    public $secado, $granoDeSoya, $merma, $agua;
    public $secadoP, $mermaP, $aguaP;
    public $fecha, $lote, $balance;



    public function mount (){
        if (!$this->produccion && $this->produccionId) {
                $this->produccion = Produccion::find($this->produccionId);
        }

        $this->button = create_button($this->action, "Produccion");
    }

    
    public function render(){
        $balance = Produccion::find($this->produccionId);

        //Extraemos los datos de la tabla produccion y los asignamos en la variable balances, de ahí los derivamos en sus variables respectivas    
        $this->granoDeSoya = $balance->granoDeSoya;
        $this->merma = $balance->merma;
        $this->agua = $balance->agua;
        $this->secado = $balance->secado;
        $this->fecha = $balance->fecha;
        $this->lote = $balance->lote;

        return view('livewire.create-balance');
    } 

    public function generatePdf()
    {        
        $produccions = Produccion::all();

        $pdf = Pdf::loadView('pages.produccion.pdf', compact('produccions'));
        return $pdf->setPaper('A4')->stream('balance.pdf');
    }
}
