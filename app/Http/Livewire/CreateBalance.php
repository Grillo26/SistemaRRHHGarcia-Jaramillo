<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Dompdf\Dompdf;

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
      

        //a cada variable decimal le damos un formato de 3 digitos despues del punto 0.000
        $this->mermaP = ($this->merma*100)/$this->granoDeSoya;
        $this->mermaP = number_format($this->mermaP, 3);

        $this->aguaP = ($this->agua*100)/$this->granoDeSoya;
        $this->aguaP = number_format($this->aguaP, 3);

        $this->secadoP = ($this->secado*100)/$this->granoDeSoya;
        $this->secadoP = number_format($this->secadoP, 3);

        return view('livewire.create-balance',[
            'turnos'=>Turno::get()
        ]);
    }

    public function generatePdf()
    {
        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Renderiza la vista en HTML
        $html = view('pages.produccion.pdf', ['secado' => $this->secadoP])->render();

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderiza el PDF
        $dompdf->render();

        // Descarga el PDF en el navegador
        $dompdf->stream('archivo.pdf');
    }
}
