<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use App\Models\Balance;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Carbon\Carbon;


use Illuminate\Support\Facades\File;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;



class createBalance extends Component
{
    public $produccion;
    public $produccionId;
    public $balance;
    public $balanceId;
    public $action;
    public $button;
    public $imagePath; 
    public $lote;

    public function mount (){
        if (!$this->balance && $this->balanceId) {
                $this->balance = Balance::find($this->balanceId);
        }

        $this->button = create_button($this->action, "Balance");

    }


    
    public function render(){
        $balance = Balance::find($this->balanceId);

        //Extraemos los datos de la tabla produccion y los asignamos en la variable balances, de ahí los derivamos en sus variables respectivas   
        $his->fecha = $balance->fecha;
        $this->lote = $balance->lote;
        $this->secado = $balance->secado;
        $this->agua2 = $balance->agua2;
        $this->aguaP2 = $balance->aguaP2;
        $this->aceite = $balance->aceite;
        $this->aceiteP = $balance->aceiteP;
        $this->harina = $balance->harina;
        $this->solventeP = $balance->solventeP;

        $this->hora = Carbon::parse($balance->created_at)->format('H:i:s');
        return view('livewire.create-balance');
    } 

    public function obtenerDatos(){
    $producciones = Produccion::all();

    foreach ($producciones as $produccion) {
        // Formatear la fecha y obtener solo la hora
        $produccion->hora_creacion = Carbon::parse($produccion->created_at)->format('H:i:s');
    }

    return view('livewire.tu-vista', compact('producciones'));

}

    public function generatePdf($produccionId){

        $data = Produccion::find($produccionId);
        $fecha = $data['fecha'];
        $granoDeSoya = $data['granoDeSoya'];
        $humedadGrano = $data['humedadGrano'];
        $hume = $humedadGrano*100;
        $grasaGrano = $data['grasaGrano'];
        $secado = $data['secado'];

        $resul = $granoDeSoya - $secado;
        $resulPor = ($resul*100)/$granoDeSoya;

        $merma = $data['merma'];

        $harina = $data['harina'];
        $solventeP = $data['solventeP'];

        $aceite = $data['aceite'];
        $aceiteP = $data['aceiteP'];

        $agua2 = $data['agua2'];
        $aguaP2 = $data['aguaP2'];

        $aprovechamiento =round( $solventeP + $aceiteP, 1);

        $gasLicuado = $data['gasLicuado'];
        $costoGasLicuado = $data['costoGasLicuado'];

        $personal = $data['personal'];
        $costoPersonal = $data['costoPersonal'];

        $electricidad = $data['electricidad'];
        $costoElectricidad = $data['costoElectricidad'];
        $electricidad2 = $data['electricidad2'];
        $costoElectricidad2 = $data['costoElectricidad2'];

        $bolsas = $data['bolsas'];
        $costoBolsas = $data['costoBolsas'];

        $total = $data['total'];
        $costo_total = $data['costo_total'];

        $lote = $data['lote'];


        try {
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(Storage_path('template.docx'));
            $templateProcessor->setValue('fecha',$fecha);
            $templateProcessor->setValue('granoDeSoya',$granoDeSoya);
            $templateProcessor->setValue('humedadGrano',$humedadGrano);
            $templateProcessor->setValue('hume',$hume);
            $templateProcessor->setValue('grasaGrano',$grasaGrano);
            $templateProcessor->setValue('secado',round($secado,2));
            $templateProcessor->setValue('resulPor',round($resulPor,2));


            $templateProcessor->setValue('merma',round($merma));

            $templateProcessor->setValue('harina',round($harina));
            $templateProcessor->setValue('solventeP',round($solventeP,2));

            $templateProcessor->setValue('aceite',round($aceite));
            $templateProcessor->setValue('aceiteP',round($aceiteP,2));

            $templateProcessor->setValue('agua2',round($agua2));
            $templateProcessor->setValue('aguaP2',round($aguaP2,2));

            $templateProcessor->setValue('aprovechamiento',round($aprovechamiento,2));

            $templateProcessor->setValue('gasLicuado',$gasLicuado);
            $templateProcessor->setValue('costoGasLicuado',$costoGasLicuado);

            $templateProcessor->setValue('personal',$personal);
            $templateProcessor->setValue('costoPersonal',$costoPersonal);

            $templateProcessor->setValue('electricidad',$electricidad);
            $templateProcessor->setValue('costoElectricidad',$costoElectricidad);
            $templateProcessor->setValue('electricidad2',$electricidad2);
            $templateProcessor->setValue('costoElectricidad2',$costoElectricidad2);

            $templateProcessor->setValue('bolsas',$bolsas);
            $templateProcessor->setValue('costoBolsas',$costoBolsas);

            $templateProcessor->setValue('total',$total);
            $templateProcessor->setValue('costo_total',$costo_total);

            $templateProcessor->setValue('lote',$lote);


            $templateProcessor->saveAs('Document02.docx');

            header("Content-Disposition: attachment; filename=produccion.docx; charset=iso-8859-1");
            echo file_get_contents("Document02.docx");

            
            $pdf = Pdf::loadView('pages.produccion.pdf', compact('templateProcessor'));
            // Guarda el PDF en una ubicación deseada o envíalo al navegador
            return $pdf->setPaper('A4')->stream('balance.pdf');
            
                
        } catch (\Exception $e) {
            // Manejo de excepciones
            dd($e->getMessage());
        }
        
        


        /*
        $this->imagePath = public_path('img/logo.png');
        $exports = Produccion::find($produccionId);
       

        $pdf = Pdf::loadView('pages.produccion.pdf', compact('exports'),['imagePath' => $this->imagePath]);
        return $pdf->setPaper('A4')->stream('balance.pdf'); */
    }
}
