<?php

namespace App\Http\Controllers;
use App\Models\Balance;
use App\Models\Turno;
use App\Models\Producción;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class BalanceController extends Controller
{
    
    public function index_view ()
    {
        return view('pages.balance.balance-data', [
        'produccion' => Produccion::class,
        'balance' => Balance::class
        ]);
    }
    
}
