<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('ID_Usuario'); // ID del usuario con autoincremento
            $table->string('Nombre')->comment('Nombre completo del usuario'); // Nombre del usuario
            $table->string('Correo')->unique()->comment('Correo electrónico único del usuario'); // Correo electrónico único
            $table->string('Telefono')->nullable()->comment('Número de teléfono del usuario'); // Teléfono del usuario, opcional
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
