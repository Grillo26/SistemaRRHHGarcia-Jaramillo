<?php

namespace App\Http\Controllers;
use App\Models\Turno;
use Illuminate\Http\Request;


class TurnoController extends Controller
{
    public function index_view ()
    {
        return view('pages.turno.turno-data', [
        'turno' => Turno::class
        ]);
    }
}
