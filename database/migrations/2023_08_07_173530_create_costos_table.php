<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costos', function (Blueprint $table) {
            $table->id();
            $table->float('soya');
            $table->float('gasLicuado');
            $table->float('precioGasLicuado');
            $table->float('costoGasLicuado');

            $table->float('personal');
            $table->float('precioPersonal');
            $table->float('costoPersonal');

            $table->float('electricidad');
            $table->float('precioElectricidad');
            $table->float('costoElectricidad');

            $table->float('bolsas');
            $table->float('precioBolsas');
            $table->float('costoBolsas');
            
            $table->float('costo_total');
            $table->unsignedBigInteger('produccion_id');
            $table->foreign('produccion_id')->references('id')->on('produccions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costos');
    }
}
