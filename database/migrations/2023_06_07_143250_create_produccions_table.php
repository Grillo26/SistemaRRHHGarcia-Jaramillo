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
            $table->integer('granoDeSoya');
            $table->decimal('merma',8,2);
            $table->unsignedBigInteger('idTurno')->nullable();
            $table->date('fecha')->nullable();
            $table->decimal('humedad',8,2);
            $table->decimal('bolsas',8,2);
            $table->decimal('aceite',8,2);

           
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
