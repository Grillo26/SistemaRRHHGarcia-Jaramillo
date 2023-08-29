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
            $table->decimal('precioGasLicuado',8,2)->nullable();
            $table->decimal('precioPersonal',8,2)->nullable();
            $table->decimal('precioElectricidad',8,2)->nullable();
            $table->decimal('precioBolsas',8,2)->nullable();
            $table->decimal('precioAceite',8,2)->nullable();
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
