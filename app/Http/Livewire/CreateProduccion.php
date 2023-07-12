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
    public $expeller, $granoDeSoya, $merma;
    public $ax, $agua,  $secado;
    public $secadoP, $mermaP, $aguaP;

    public $humedad, $grasa, $resultado;
    public $humedadLab, $grasaLab, $mermaSecado;

    protected $listeners = ['calcular'];

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
            'produccion.bolsas' => 'required|min:1|',
            'produccion.expeller' => 'required|min:1|',
            'produccion.humedadLab' => 'required|min:1|',
            'produccion.grasaLab' => 'required|min:1|',
            'produccion.secado' => 'required|min:1|',
            'produccion.agua' => 'required|min:1|',
        ];

        return array_merge([
            'produccion.granoDeSoya' => 'required|digits|min:1|',
            'produccion.merma' => 'required|min:1'
        ], $rules);
    }

    public function calcular(){ //metodo para calcular y enviar al input disabled
        $this->resultado = 1 - $this->humedad - $this->grasa;
        $this->resultado = round($this->resultado, 3);

        $this->mermaSecado = 1 - $this->humedadLab - $this->grasaLab;
        $this->mermaSecado = round($this->mermaSecado, 3);


        //ax: Saranda 
        $this->ax = $this->granoDeSoya *$this->resultado;

        $this->secado = ($this->ax - $this->merma)/$this->mermaSecado;
        $this->secado = round($this->secado, 3);

        $this->agua = $this->granoDeSoya - $this->merma - $this->secado;
        $this->agua = round($this->agua, 3);
        
        //a cada variable decimal le damos un formato de 3 digitos despues del punto 0.000 y almacenamos en la base de datos
        if ($this->granoDeSoya != 0) {
            $this->mermaP = number_format(($this->merma * 100) / $this->granoDeSoya, 3);
            $this->aguaP = number_format(($this->agua *100)/ $this->granoDeSoya,3);
            $this->secadoP = number_format(($this->secado*100)/$this->granoDeSoya,3);
        } else {
            $this->mermaP = null;
            $this->aguaP = null;
            $this->secadoP = null;
        }
    

    }
    
    public function createProduccion ()
    {
        //Calculo del expeller dependiendo de las bolsas ingresadas en el fomulario
        $this->expeller = $this->produccion['bolsas']*50; //Extraemos del formulario
        $data = $this->produccion;

        $data['expeller'] = $this->expeller;
        $data['agua'] = $this->agua;
        $data['secado'] = $this->secado;
        $data['mermaP'] = $this->mermaP;
        $data['aguaP'] = $this->aguaP;
        $data['secadoP'] = $this->secadoP;
        

    
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
        $this->calcular();

    }

    public function render()
    {
        return view('livewire.create-produccion',[
            'turnos'=>Turno::get()
        ]
    );
    }
}
