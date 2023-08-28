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
            $table->decimal('humedadGrano',8,3);
            $table->decimal('grasaGrano',8,3);
            $table->decimal('mSecaGrano',8,3);

            $table->decimal('merma',8,3);

            //Rendimiento1

            $table->decimal('secado',8,3); //Soya Final
            $table->decimal('humedadSecado',8,3);
            $table->decimal('grasaSecado',8,3);
            $table->decimal('mSecaSecado',8,3);

            $table->decimal('agua',8,3);
            
            //Porcentajes
            $table->decimal('mermaP',8,3); 
            $table->decimal('aguaP',8,3);
            $table->decimal('secadoP',8,3);

            $table->unsignedBigInteger('idTurno')->nullable();
            $table->date('fecha')->nullable();

            $table->integer('bolsas');
            $table->integer('expeller');

            //Rendimiento 2
            $table->decimal('agua2',8,3)->nullable();

            $table->decimal('aceite',8,3)->nullable();
            $table->decimal('humedadAceite',8,3)->nullable();
            $table->decimal('grasaAceite',8,3)->nullable();
            $table->decimal('mSecaAceite',8,3)->nullable();

            $table->decimal('harina',8,3)->nullable();
            $table->decimal('humedadHarina',8,3)->nullable();
            $table->decimal('grasaHarina',8,3)->nullable();
            $table->decimal('mSecaHarina',8,3)->nullable();

            //Porcentajes
            $table->decimal('aguaP2',8,3)->nullable();
            $table->decimal('aceiteP',8,3)->nullable();
            $table->decimal('solventeP',8,3)->nullable();

            //Costos
            $table->float('gasLicuado')->nullable();
            $table->float('precioGasLicuado')->nullable();
            $table->float('costoGasLicuado')->nullable();

            $table->float('personal')->nullable();
            $table->float('precioPersonal')->nullable();
            $table->float('costoPersonal')->nullable();

            $table->float('electricidad')->nullable();
            $table->float('precioElectricidad')->nullable();
            $table->float('costoElectricidad')->nullable();
            $table->float('electricidad2')->nullable();
            $table->float('costoElectricidad2')->nullable();

            $table->float('precioBolsas')->nullable();
            $table->float('costoBolsas')->nullable();
            
            $table->float('total')->nullable();
            $table->float('costo_total')->nullable();

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
