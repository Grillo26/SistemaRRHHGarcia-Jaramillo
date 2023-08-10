<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lote')->nullable();

            $table->decimal('agua2',8,3);

            $table->decimal('aceite',8,3);
            $table->decimal('humedadAceite',8,3);
            $table->decimal('grasaAceite',8,3);
            $table->decimal('mSecaAceite',8,3);

            $table->decimal('harina',8,3);
            $table->decimal('humedadHarina',8,3);
            $table->decimal('grasaHarina',8,3);
            $table->decimal('mSecaHarina',8,3);

            //Porcentajes
            $table->decimal('aguaP2',8,3);
            $table->decimal('aceiteP',8,3);
            $table->decimal('solventeP',8,3);


            $table->foreign('lote')
            ->references('id')->on('produccions')->onDelete('set null');

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
        Schema::dropIfExists('balances');
    }
}
