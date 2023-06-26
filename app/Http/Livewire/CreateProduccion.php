<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class createProduccion extends Component
{
    public $produccion;
    public $produccionId;
    public $action;
    public $button;
    public $turno;
    public $expeller;
    public $a, $b, $d, $e;

    
    protected function getRules()
    {
        $rules = ($this->action == "updateProduccion". $this->produccionId) ? [ 
            'produccion.lote' => 'required|min:1|',
            'produccion.granoDeSoya' => 'required|min:1|',
            'produccion.merma' => 'required|min:1|'
        ] : [
            'produccion.lote' => 'required|min:1|',
            'produccion.granoDeSoya' => 'required|digits|min:1|',
            'produccion.merma' => 'required|min:1|',
            'produccion.idTurno' => 'required|min:1|',
            'produccion.fecha' => 'required|min:1|',
            'produccion.humedad' => 'required|min:1|',
            'produccion.aceite' => 'required|min:1|',
            'produccion.grasas' => 'required|min:1|',
            'produccion.luz' => 'required|min:1|',
            'produccion.bolsas' => 'required|min:1|'
        ];

        return array_merge([
            'produccion.granoDeSoya' => 'required|digits|min:1|',
            'produccion.merma' => 'required|min:1'
        ], $rules);
    }
    
    public function createProduccion ()
    {
        //Calculo del expeller dependiendo de las bolsas ingresadas en el fomulario
        $this->expeller = $this->produccion['bolsas']*50; //Extraemos del formulario
        $data = $this->produccion;

        //Calculo de balance 
        //a: Saranda b:merma e:secado d:agua
        $this->a = $this->produccion['granoDeSoya']*(1-$this->produccion['humedad']-$this->produccion['grasas']);
        $this->b = $this->produccion['merma'];
        $this->e = ($this->a-$this->b)/(1-$this->produccion['humedadLab']-$this->produccion['grasaLab']) ;
        $this->d = $this->a - $this->b - $this->e;

        $data['expeller'] = $this->expeller;
        $data['secado'] = $this->e;
        $data['agua'] = $this->d;
        

    
        Produccion::create($data);

        $this->emit('saved');
        $this->reset('produccion'); 
    }

    public function updateProduccion ()
    {
        
        Produccion::query()
            ->where('id', $this->produccionId)
            ->update([
                "lote" => $this->produccion->lote,
                "granoDeSoya" => $this->produccion->granoDeSoya,
                "merma" => $this->produccion->merma,
                "idTurno" => $this->produccion->idTurno,
                "fecha" => $this->produccion->fecha,
                "humedad" => $this->produccion->humedad,
                "bolsas" => $this->produccion->bolsas,
                "aceite" => $this->produccion->aceite,
                "grasas" => $this->produccion->grasas,
                "luz" => $this->produccion->luz,
                "bolsas" => $this->produccion->bolsas,
                "expeller" => $this->produccion['bolsas']*50, //El campo bolsas multiplicamos por 50
                
            ]);

        $this->emit('saved');
    }


    public function mount ()
    {
        if (!$this->produccion && $this->produccionId) {
                $this->produccion = Produccion::find($this->produccionId);
        }

        $this->button = create_button($this->action, "Produccion");
    }

    public function render()
    {
        return view('livewire.create-produccion',[
            'turnos'=>Turno::get()
        ]
    );
    }
}
