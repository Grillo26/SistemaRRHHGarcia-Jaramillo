<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use App\Models\Costo;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class createCosto extends Component
{
    public $costo;
    public $costoId;
    public $produccionId;
    public $produccion;

    public $action;
    public $button;


    //Precio por unidad 
    public $precioGasLicuado = 3.1;
    public $precioPersonal = 330;
    public $precioElectricidad = 0.601;
    public $precioBolsas = 2.15;
    public $aceite = 1000;

    protected $listeners = ['calcular'];

    protected function getRules()
    {
        $rules = ($this->action == "updateCosto". $this->costoId) ? [ 
            'costo.precioGasLicuado' => 'required|min:1|',
            'costo.precioPersonal' => 'required|min:1|',
            'costo.precioElectricidad' => 'required|min:1|'
        ] : [
            'costo.precioGasLicuado' => 'required|min:1|',
            'costo.precioPersonal' => 'required|min:1|',
            'costo.precioElectricidad' => 'required|min:1|',
            'costo.precioBolsas' => 'required|min:1|',
            'costo.precioAceite' => 'required|min:1|',
        ];

        return array_merge([
            'costo.granoDeSoya' => 'required|digits|min:1|',
            'costo.merma' => 'required|min:1'
        ], $rules);
    }

    public function createCosto (){

        Costo::create($this->costo);

        $this->emit('saved');
        $this->reset('costo'); 
        $this->limpiarCampos();
    }

    public function updateCosto (){
        Costo::query()
        ->where('id', $this->costoId)
        ->update([ 
            "precioGasLicuado" => $this->costo->precioGasLicuado,
            "precioPersonal" => $this->costo->precioPersonal,
            "precioElectricidad" => $this->costo->precioElectricidad,
            "precioBolsas" => $this->costo->precioBolsas,
            "precioAceite" => $this->costo->precioAceite

        ]);
        $this->emit('saved');    
    }


    public function mount (){
        if (!$this->costo && $this->costoId) {
                $this->costo = Costo::find($this->costoId);
        }
        $this->button = create_button($this->action, "Costo");
    }

    public function render(){
        return view('livewire.create-costo',[
            'turnos'=>Turno::get(),
            'produccions'=> Produccion::get()
        ]
    );
    }

    public function limpiarCampos(){

    }
}
