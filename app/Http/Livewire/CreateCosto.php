<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
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

    public function calcular(){ //metodo para calcular y enviar al input disabled
        $this->producciones = Produccion::find($this->selectedId);
       
    }
    public function loadSelectedData()
    {
        // Carga los datos según el ID seleccionado
        $this->producciones = Produccion::find($this->selectedId);
    }

    public function createCosto ()
    {
        //Calculo del expeller dependiendo de las bolsas ingresadas en el fomulario
        $this->expeller = $this->costo['bolsas']*50; //Extraemos del formulario
        $data = $this->costo;

        $data['granoDeSoya'] = $this->granoDeSoya;
        $data['humedadGrano'] = $this->humedadGrano;
  
        
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
