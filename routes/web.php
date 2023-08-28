<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\CostoController;
use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CreateBalance;
use App\Http\Livewire\Costos;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    Route::get('/turno', [ TurnoController::class, "index_view" ])->name('turno');
    Route::view('/turno/new', "pages.turno.turno-new")->name('turno.new');
    Route::view('/turno/edit/{turnoId}', "pages.turno.turno-edit")->name('turno.edit');

    Route::get('/produccion', [ ProduccionController::class, "index_view" ])->name('produccion');
    Route::view('/produccion/new', "pages.produccion.produccion-new")->name('produccion.new');
    Route::view('/produccion/edit/{produccionId}', "pages.produccion.produccion-edit")->name('produccion.edit');
    Route::view('/produccion/costo/{produccionId}', "pages.produccion.produccion-costo")->name('produccion.costo');
    Route::view('/produccion/balance/{produccionId}', "pages.produccion.produccion-balance")->name('produccion.balance');      
    Route::view('/produccion/pdf/{produccionId}', "pages.produccion.pdf")->name('produccion.pdf');   
       
    Route::get('/produccion/pdf/{produccionId}', [ CreateBalance::class, 'generatePdf' ]);

    Route::get('/balance', [ BalanceController::class, "index_view" ])->name('balance');
    Route::view('/balance/new/{produccionId}', "pages.balance.balance-new")->name('balance.new');

    Route::get('/costo', [ CostoController::class, "index_view" ])->name('costo');
    Route::view('/costo/new', "pages.costo.costo-new")->name('costo.new');
    Route::view('/costo/edit/{turnoId}', "pages.costo.costo-edit")->name('costo.edit');





    
});
