<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\livewire\Productos;
use App\Http\livewire\Grupos;
use App\Http\livewire\Cuentas;
use App\Http\livewire\Salidas;
use App\Http\livewire\Unidades;

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

    Route::get('productos', Productos::class)->name('productos');
    Route::view('/productos/new', "pages.productos.productos-new")->name('productos.new');

    Route::get('grupos', Grupos::class)->name('grupos');

    Route::get('cuentas', Cuentas::class)->name('cuentas');

    Route::get('unidades', Unidades::class)->name('unidades');

    Route::get('salidas', Salidas::class)->name('salidas');
});
