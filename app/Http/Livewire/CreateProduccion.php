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
    //Porcentajes
    public $secadoP, $mermaP, $aguaP, $aguaP2, $aceiteP , $solventeP;

    public $humedad, $grasa, $resultado;
    public $humedadLab, $grasaLab, $mermaSecado;

    public $agua2, $aceite, $humedadAce, $grasaAce, $mermaAce, $harina, $humedadHarina, $grasaHarina, $mermaHarina, $inicio=1;

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
            'produccion.mermaP' => 'required|min:1|',
            'produccion.aguaP' => 'required|min:1|',
            'produccion.secadoP' => 'required|min:1|',
            'produccion.humedadAce' => 'required|min:1|',
            'produccion.grasaAce' => 'required|min:1|',
            'produccion.harina' => 'required|min:1|',
            'produccion.humedadHarina' => 'required|min:1|',
            'produccion.grasaHarina' => 'required|min:1|',
            'produccion.agua2' => 'required|min:1|',
        ];

        return array_merge([
            'produccion.granoDeSoya' => 'required|digits|min:1|',
            'produccion.merma' => 'required|min:1'
        ], $rules);
    }

    public function calcular(){ //metodo para calcular y enviar al input disabled
        $this->resultado = $this->inicio - $this->humedad - $this->grasa;
        $this->resultado = round($this->resultado, 3);

        $this->mermaSecado = $this->inicio - $this->humedadLab - $this->grasaLab;
        $this->mermaSecado = round($this->mermaSecado, 3);


        //ax: Saranda 
        $this->ax = $this->granoDeSoya *$this->resultado;

        $this->secado = ($this->ax - $this->merma)/$this->mermaSecado;
        $this->secado = round($this->secado, 3);

        $this->agua = $this->granoDeSoya - $this->merma - $this->secado;
        $this->agua = round($this->agua, 3);
        
        //TABLA RENDIMIENTO 1
        if ($this->granoDeSoya != 0) {
            $this->mermaP = number_format(($this->merma * 100) / $this->granoDeSoya, 3);
            $this->aguaP = number_format(($this->agua *100)/ $this->granoDeSoya,3);
            $this->secadoP = number_format(($this->secado*100)/$this->granoDeSoya,3);
        } else {
            $this->mermaP = null;
            $this->aguaP = null;
            $this->secadoP = null;
        }

        //<------- PROCESO 2------>
        //Aceite
        $this->mermaAce = 1 - $this->humedadAce - $this->grasaAce;
        $this->mermaAce = round($this->mermaAce, 3);

        //Harina
        $this->mermaHarina = $this->inicio - $this->humedadHarina - $this->grasaHarina;
        $this->mermaHarina = round($this->mermaHarina, 3);

        $this->agua2 = $this->secado - $this->aceite - $this->harina;
        $this->agua2 = round($this->agua2, 3);

        //TABLA RENDIMIENTO 2
        if ($this->granoDeSoya != 0) {
            $this->aguaP2 = number_format(($this->agua2*100)/ $this->secado,3);
            $this->aceiteP = number_format(($this->aceite*100)/$this->secado,3);
            $this->solventeP = number_format(($this->harina*100) / $this->secado, 3);

        } else {
            $this->aguaP2 = null;
            $this->aceiteP = null;
            $this->solventeP = null;
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
        $data['aceite'] = $this->aceite;
        
        $data['humedadAce'] = $this->humedadAce;
        $data['grasaAce'] = $this->grasaAce;
        $data['harina'] = $this->harina;
        $data['humedadHarina'] = $this->humedadHarina;
        $data['grasaHarina'] = $this->grasaHarina;
        $data['agua2'] = $this->agua2;
        $data['aguaP2'] = $this->aguaP2;
        $data['aceiteP'] = $this->aceiteP;
        $data['solventeP'] = $this->solventeP;

        

    
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
                "expeller" => $this->produccion['bolsas']*50, //El campo bolsas multiplicamos por 50  
                "mermaP" => $this->produccion->mermaP,              
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

    public function limpiarCampos(){
        $this->granoDeSoya = '';
        $this->humedad = '';
        $this->grasa = '';
        $this->merma ='';
        $this->humedadLab= '';
        $this->grasaLab= '';
        $this->agua= '';
        $this->resultado= '';
        $this->mermaSecado= '';
        $this->secado= '';
        $this->mermaP= '';
        $this->secadoP= '';
        $this->aguaP= '';
        $this->humedadAce= '';
        $this->grasaAce= '';
        $this->harina= '';
        $this->humedadHarina= '';
        $this->grasaHarina= '';
        $this->agua2= '';
        $this->aguaP2= '';
        $this->aceiteP= '';
        $this->solventeP= '';
        $this->mermaHarina= '';
        $this->mermaAce= '';
        $this->aceite= '';

    }
}
