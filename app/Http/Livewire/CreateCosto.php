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

    public $producciones;
    public $selectedId;

    public $action;
    public $button;

    //Cantidad
    public $soya, $gasLicuado, $personal, $electricidad, $electricidad2, $bolsas, $total, $costo_total;

    //Precio por unidad 
    public $precioGasLicuado = 3.1;
    public $precioPersonal = 330;
    public $precioElectricidad = 0.601;
    public $precioBolsas = 2.15;
    public $aceite = 1000;

    //Costo
    public $costoGasLicuado;
    public $costoPersonal;
    public $costoElectricidad;
    public $costoElectricidad2;
    public $costoBolsas;


  

    protected $listeners = ['calcular'];

    protected function getRules()
    {
        $rules = ($this->action == "updateProduccion". $this->costoId) ? [ 
            'costo.lote' => 'required|min:1|',
            'costo.granoDeSoya' => 'required|min:1|',
            'costo.merma' => 'required|min:1|'
        ] : [
            'costo.lote' => 'required|min:1|',
            'costo.granoDeSoya' => 'required|digits|min:1|', 'costo.humedadGrano' => 'required|min:1|','costo.grasaGrano' => 'required|min:1|','costo.mSecaGrano' => 'required|min:1|',
            'costo.merma' => 'required|min:1|'
        ];

        return array_merge([
            'costo.granoDeSoya' => 'required|digits|min:1|',
            'costo.merma' => 'required|min:1'
        ], $rules);
    }

    public function loadSelectedData(){
        $this->producciones = Produccion::find($this->selectedId);

    }

    public function calcular(){ //metodo para calcular y enviar al input disabled
        $this->loadSelectedData();
        $this->costoGasLicuado = $this->gasLicuado * $this->precioGasLicuado;
        $this->costoGasLicuado= round($this->costoGasLicuado, 2);

        $this->costoPersonal = $this->personal * $this->precioPersonal;
        $this->costoPersonal= round($this->costoPersonal, 2);


        $this->costoElectricidad = $this->electricidad * $this->precioElectricidad;
        $this->costoElectricidad= round($this->costoElectricidad, 2);


        $this->costoElectricidad2 = $this->electricidad2 * $this->precioElectricidad;
        $this->costoElectricidad2= round($this->costoElectricidad2, 2);

        $this->costoBolsas = $this->bolsas * $this->precioBolsas;
        $this->costoBolsas= round($this->costoBolsas, 2);

        $this->total = $this->costoGasLicuado + $this->costoPersonal + $this->costoElectricidad;
        $this->total= round($this->total, 2);

        $this->costo_total = $this->costoElectricidad2 + $this->costoBolsas + $this->total;
        $this->costo_total= round($this->costo_total, 2);


        
        

       
    }
    public function createCosto ()
    {
        $data = $this->costo;

        $data['soya'] = $this->soya;
        $data['gasLicuado'] = $this->gasLicuado;
        $data['precioGasLicuado'] = $this->precioGasLicuado;
        $data['costoGasLicuado'] = $this->costoGasLicuado;

        $data['personal'] = $this->personal;
        $data['precioPersonal'] = $this->precioPersonal;
        $data['costoPersonal'] = $this->costoPersonal;
       

        $data['electricidad'] = $this->electricidad;
        $data['precioElectricidad'] = $this->precioElectricidad;
        $data['costoElectricidad'] = $this->costoElectricidad;

        $data['bolsas'] = $this->bolsas;
        $data['precioBolsas'] = $this->precioBolsas;
        $data['costoBolsas'] = $this->costoBolsas;

        $data['costo_total'] = $this->costo_total;
        $data['produccion_id'] = $this->selectedId;
        
        
        Costo::create($data);

        $this->emit('saved');
        $this->reset('costo'); 
        $this->limpiarCampos();
    }

    public function updateProduccion ()
    {
        Produccion::query()
            ->where('id', $this->costoId)
            ->update([
                'agua2' => $this->agua2,
                'aceite' => $this->aceite,
            ]);

        $this->emit('saved');
        
        
    }


    public function mount ()
    {
        if (!$this->costo && $this->costoId) {
                $this->costo = Costo::find($this->costoId);
        }
        $this->button = create_button($this->action, "Costo");
        

    }

    public function render()
    {
        return view('livewire.create-costo',[
            'turnos'=>Turno::get(),
            'produccions'=> Produccion::get()
        ]
    );
    }

    public function limpiarCampos(){
        $this->granoDeSoya = null;

        $this->secadoP = null;

    }
}
