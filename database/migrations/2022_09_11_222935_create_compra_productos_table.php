<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_productos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_compra');
            $table->integer('horac');
            $table->decimal('total', 10,2);
            $table->string('ady');
            $table->unsignedBigInteger('proveedor_idProveedor')->nullable();

            $table->foreign('proveedor_idProveedor')
            ->references('id')->on('proveedors')->onDelete('set null');



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
        Schema::dropIfExists('compra_productos');
    }
};
