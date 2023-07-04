<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccions', function (Blueprint $table) {
            $table->id();
            $table->integer('lote');
            $table->integer('granoDeSoya');
            $table->decimal('merma',8,3);
            $table->unsignedBigInteger('idTurno')->nullable();
            $table->date('fecha')->nullable();
            $table->decimal('humedad',8,3);
            $table->integer('bolsas');
            $table->integer('expeller');
            $table->decimal('aceite',8,3);
            $table->decimal('grasas',8,3);
            $table->decimal('luz',8,3);

            $table->decimal('humedadLab',8,3);
            $table->decimal('grasaLab',8,3);
            $table->decimal('secado',8,3);

            $table->decimal('agua',8,3);

            //Porcentajes
            $table->decimal('mermaP',8,3); 
            $table->decimal('aguaP',8,3);
            $table->decimal('secadoP',8,3);

           
            $table->foreign('idTurno')
            ->references('id')->on('turnos')->onDelete('set null');
            
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
        Schema::dropIfExists('produccions');
    }
}
