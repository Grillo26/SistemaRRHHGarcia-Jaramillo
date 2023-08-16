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
            $table->float('gasLicuado');
            $table->float('gasLicuado');

            $table->float('personal');
            $table->float('personal');
            $table->float('personal');

            $table->float('electricidad');
            $table->float('electricidad');
            $table->float('electricidad');

            $table->float('bolsas');
            $table->float('bolsas');
            $table->float('bolsas');
            
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
