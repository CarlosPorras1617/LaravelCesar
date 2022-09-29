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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            //llave foranea id de usuario
            $table->unsignedBigInteger('id_usuario');
            //llave foranea id de producto
            $table->unsignedBigInteger('id_producto');
            $table->date('fecha_compra');
            $table->timestamps();

            //relacionar las talas
            $table->foreign('id_usuario') -> references('id') -> on('usuarios');
            $table->foreign('id_producto') -> references('id') -> on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
