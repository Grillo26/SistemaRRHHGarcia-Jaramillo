<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Balance;
use App\Models\Turno;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class createProduccion extends Component
{
    public $produccion;
    public $produccionId;
    public $action;
    public $button;

    //Variables
    public $granoDeSoya, $humedadGrano, $grasaGrano, $mSecaGrano;
    public $merma;
    public $secado, $humedadSecado, $grasaSecado, $mSecaSecado;
    public $agua, $agua2;

    public $aceite, $humedadAceite, $grasaAceite, $mSecaAceite;
    public $harina, $humedadHarina, $grasaHarina, $mSecaHarina;

    //Porcentajes
    public $mermaP, $aguaP, $secadoP;
    public $aguaP1, $aceiteP, $solventeP;

    public $resultado;

    protected $listeners = ['calcular'];

    protected function getRules()
    {
        $rules = ($this->action == "updateProduccion". $this->produccionId) ? [ 
            'produccion.lote' => 'required|min:1|',
            'produccion.granoDeSoya' => 'required|min:1|',
            'produccion.merma' => 'required|min:1|'
        ] : [
            'produccion.lote' => 'required|min:1|',
            'produccion.granoDeSoya' => 'required|digits|min:1|', 'produccion.humedadGrano' => 'required|min:1|','produccion.grasaGrano' => 'required|min:1|','produccion.mSecaGrano' => 'required|min:1|',
            'produccion.merma' => 'required|min:1|',
            'produccion.secado' => 'required|min:1|','produccion.humedadSecado' => 'required|min:1|', 'produccion.grasaSecado' => 'required|min:1|', 'produccion.mSecaSecado' => 'required|min:1|',
            'produccion.agua' => 'required|min:1|',
            'produccion.agua2' => 'required|min:1|',
            'produccion.mermaP' => 'required|min:1|','produccion.aguaP' => 'required|min:1|','produccion.secadoP' => 'required|min:1|',
            'produccion.idTurno' => 'required|min:1|',
            'produccion.fecha' => 'required|min:1|',
            'produccion.bolsas' => 'required|min:1|',
            'produccion.expeller' => 'required|min:1|',

            'produccion.aceite' => 'required|min:1|', 'produccion.humedadAceite' => 'required|min:1|', 'produccion.grasaAceite' => 'required|min:1|', 'produccion.mSecaAceite' => 'required|min:1|', 
            'produccion.harina' => 'required|min:1|', 'produccion.humedadHarina' => 'required|min:1|', 'produccion.grasaHarina' => 'required|min:1|', 'produccion.mSecaHarina' => 'required|min:1|', 
        ];

        return array_merge([
            'produccion.granoDeSoya' => 'required|digits|min:1|',
            'produccion.merma' => 'required|min:1'
        ], $rules);
    }

    public function calcular(){ //metodo para calcular y enviar al input disabled
        $this->ax = $this->granoDeSoya *$this->mSecaGrano;
        $this->rendimiento1();
        $this->rendimiento2();
    }

    public function rendimiento1(){
        if ($this->granoDeSoya != 0) {
            $this->mSecaGrano = 1 - $this->humedadGrano - $this->grasaGrano;
            $this->mSecaGrano = round($this->mSecaGrano, 3); 

            $this->mSecaSecado = 1 - $this->humedadSecado - $this->grasaSecado;
            $this->mSecaSecado = round($this->mSecaSecado, 3);

            $this->secado = ($this->ax - $this->merma)/$this->mSecaSecado;
            $this->secado = round($this->secado, 3);

            $this->agua = $this->granoDeSoya - $this->merma - $this->secado;
            $this->agua = round($this->agua, 3);

            $this->mermaP = number_format(($this->merma * 100) / $this->granoDeSoya, 2); 
            $this->aguaP = number_format(($this->agua *100)/ $this->granoDeSoya,2);
            $this->secadoP = number_format(($this->secado*100)/$this->granoDeSoya,2);
        }
        else{
            $this->mSecaGrano = null;
            $this->mSecaSecado = null;
            $this->mermaP = null;
            $this->aguaP = null;
            $this->secadoP = null;
            $this->secado = null;
            $this->agua = null;
        }
    }

    public function rendimiento2(){

        //Agrega datos a la tabla balances en base al id lote
        if ($this->aceite != 0) {
            $this->resultado = 1 - $this->produccion->humedadAceite - $this->produccio->grasaAceite;
            $this->mSecaAceite = round($this->mSecaAceite, 3);

            $this->mSecaHarina = 1 - $this->humedadHarina - $this->grasaHarina;
            $this->mSecaHarina = round($this->mSecaHarina, 3);

            $this->agua2 = $this->produccion['secado'] - $this->aceite - $this->harina;
            $this->agua2 = round($this->agua2, 3);

            $this->aguaP2 = number_format(($this->agua2 * 100) / $this->produccion['secado'], 3);
            $this->aceiteP = number_format(($this->aceite * 100) / $this->produccion['secado'], 3);
            $this->solventeP = number_format(($this->harina * 100) / $this->produccion['secado'], 3);
        } 
        else {
            $this->mSecaAceite = null;
            $this->mSecaHarina = null;
            $this->agua2 = null;
            $this->aguaP2 = null;
            $this->aceiteP = null;
            $this->solventeP = null;
        }

        if ($this->produccion && isset($this->produccion['humedadAceite']) && isset($this->produccion['grasaAceite'])) {
            $this->produccion['mSecaAceite'] = 1 - $this->produccion['humedadAceite'] - $this->produccion['grasaAceite'];
        } else {
            // Manejar el caso en el que uno de los valores sea null o no esté definido
        }

    }
    
    public function createProduccion ()
    {
        //Calculo del expeller dependiendo de las bolsas ingresadas en el fomulario
        $this->expeller = $this->produccion['bolsas']*50; //Extraemos del formulario
        $data = $this->produccion;

        $data['granoDeSoya'] = $this->granoDeSoya;
        $data['humedadGrano'] = $this->humedadGrano;
        $data['grasaGrano'] = $this->grasaGrano;
        $data['mSecaGrano'] = $this->mSecaGrano;

        $data['agua'] = $this->agua;

        $data['secado'] = $this->secado;
        $data['humedadSecado'] = $this->humedadSecado;
        $data['grasaSecado'] = $this->grasaSecado;
        $data['mSecaSecado'] = $this->mSecaSecado;

        $data['expeller'] = $this->expeller;
     
        $data['mermaP'] = $this->mermaP;
        $data['aguaP'] = $this->aguaP;
        $data['secadoP'] = $this->secadoP;

        //######################################################

        $data['agua2'] = null;

        $data['aceite'] = null;
        $data['humedadAceite'] = null;
        $data['grasaAceite'] = null;
        $data['mSecaAceite'] = null;

        $data['harina'] = null;
        $data['humedadHarina'] = null;
        $data['grasaHarina'] = null;
        $data['mSecaHarina'] = null;

        $data['aguaP2'] = null;
        $data['aceiteP'] = null;
        $data['solventeP'] = null;
        
        Produccion::create($data);

        $this->emit('saved');
        $this->reset('produccion'); 
        $this->limpiarCampos();
    }

    public function updateProduccion ()
    {
        
        $this->produccion->save();
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
        $this->granoDeSoya = null;
        $this->humedadGrano = null;
        $this->grasaGrano = null;
        $this->mSecaGrano = null;
        $this->merma = null;
        $this->agua = null;
        $this->secado = null;
        $this->humedadSecado = null;
        $this->grasaSecado = null;
        $this->mSecaSecado = null;
        $this->mermaP = null;
        $this->aguaP = null;
        $this->secadoP = null;

    }
}
