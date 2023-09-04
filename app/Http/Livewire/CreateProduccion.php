<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Balance;
use App\Models\Turno;
use App\Models\Costo;
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

    //Precios
    public $precioPersonal, $precioGasLicuado, $precioElectricidad, $precioBolsas, $precioAceite;

    public $resultado;

    protected $listeners = ['calcular'];

    public function calcular(){ //metodo para calcular y enviar al input disabled
        $this->ax = $this->granoDeSoya *$this->mSecaGrano;
        $this->rendimiento1();
        $this->rendimiento2();

        if($this->action == "costoProduccion"){
            $this->calculoCosto();
        }
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
        if ($this->produccion && isset($this->produccion['humedadAceite']) && isset($this->produccion['grasaAceite'])) {
            $this->produccion['mSecaAceite'] = round( 1 - $this->produccion['humedadAceite'] - $this->produccion['grasaAceite'],3);
            $this->produccion['mSecaHarina'] = round( 1 - $this->produccion['humedadHarina'] - $this->produccion['grasaHarina'],3);
            $this->produccion['agua2'] = round( $this->produccion['secado'] - $this->produccion['aceite'] - $this->produccion['harina'],3);

            $this->produccion['aguaP2'] = number_format(($this->produccion['agua2'] * 100) / $this->produccion['secado'], 2);
            $this->produccion['aceiteP'] = number_format(($this->produccion['aceite'] * 100) / $this->produccion['secado'], 2);
            $this->produccion['solventeP'] = number_format(($this->produccion['harina'] * 100) / $this->produccion['secado'], 2);


        } else {
            // Manejar el caso en el que uno de los valores sea null o no esté definido
        }

    }

    public function calculoCosto(){
            $costo = Costo::find(1);
            $this->precioGasLicuado = $costo['precioGasLicuado'];
            $this->precioPersonal = $costo['precioPersonal'];
            $this->precioElectricidad = $costo['precioElectricidad'];
            $this->precioBolsas = $costo['precioBolsas'];
            $this->precioAceite = $costo['precioAceite'];

                $this->produccion['costoGasLicuado'] = round($this->produccion['gasLicuado'] * $this->precioGasLicuado,2);
                $this->produccion['costoPersonal'] = round($this->produccion['personal'] * $this->precioPersonal,2);
                $this->produccion['costoElectricidad'] = round($this->produccion['electricidad'] * $this->precioElectricidad,2);
                $this->produccion['costoElectricidad2'] = round($this->produccion['electricidad2'] * $this->precioElectricidad,2);
                $this->produccion['costoBolsas'] = round($this->produccion['bolsas'] * $this->precioBolsas,2);
                $this->produccion['total']= round($this->produccion['costoGasLicuado'] + $this->produccion['costoPersonal'] + $this->produccion['costoElectricidad'],2);
                $this->produccion['costo_total'] = round($this->produccion['costoElectricidad2'] + $this->produccion['costoBolsas'] + $this->produccion['total'],2);


    }
    
    public function createProduccion (){
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

        $data['gasLicuado'] = null; 
        $data['precioGasLicuado'] = null; 
        $data['costoGasLicuado'] = null; 
        $data['personal'] = null; 
        $data['precioPersonal'] = null; 
        $data['costoPersonal'] = null;
        $data['electricidad'] = null;
        $data['precioElectricidad'] = null;
        $data['costoElectricidad'] = null;
        $data['electricidad2'] = null;
        $data['costoElectricidad2'] = null;
        $data['precioBolsas'] = null;
        $data['costoBolsas'] = null;
        $data['total'] = null;
        $data['costo_total'] = null;

        Produccion::create($data);

        $this->emit('saved');
        $this->reset('produccion'); 
        $this->limpiarCampos();

    }

    public function updateProduccion (){    
        $this->produccion->save();
        $this->emit('saved');  
    }

    public function costoProduccion(){
        $this->produccion->save();
        $this->emit('saved'); 
        
    }

    public function mount (){
        if (!$this->produccion && $this->produccionId) {
                $this->produccion = Produccion::find($this->produccionId);
        }


        $this->button = create_button($this->action, "Produccion");
        $this->calcular();
    }

    public function render(){
        return view('livewire.create-produccion',[
            'turnos'=>Turno::get(),
            'costos'=>Costo::get()
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

    protected function getRules(){
        $rules = ($this->action == "updateProduccion". $this->produccionId
        || $this->action == "costoProduccion". $this->produccionId) ? [ 
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
            'produccion.aguaP2' => 'required|min:1|', 'produccion.aceiteP'=> 'required|min:1|', 'produccion.solventeP' => 'required|min:1|',

            'produccion.gasLicuado' => 'required|min:1|', 'produccion.precioGasLicuado'=> 'required|min:1|', 'produccion.costoGasLicuado' => 'required|min:1|',
            'produccion.personal' => 'required|min:1|', 'produccion.precioPersonal'=> 'required|min:1|', 'produccion.costoPersonal' => 'required|min:1|',
            'produccion.electricidad' => 'required|min:1|', 'produccion.precioElectricidad'=> 'required|min:1|', 'produccion.costoElectricidad' => 'required|min:1|',
            'produccion.electricidad2' => 'required|min:1|', 'produccion.costoElectricidad2' => 'required|min:1|',
            'produccion.precioBolsas' => 'required|min:1|', 'produccion.costoBolsas'=> 'required|min:1|',
            'produccion.total' => 'required|min:1|', 'produccion.costo_total' => 'required|min:1|'


        ];

        return array_merge([
            'produccion.granoDeSoya' => 'required|digits|min:1|',
            'produccion.merma' => 'required|min:1'
        ], $rules);
    }

}
