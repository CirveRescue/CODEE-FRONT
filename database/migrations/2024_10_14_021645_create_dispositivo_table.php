<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivoTable extends Migration
{
    public function up()
    {
        Schema::create('dispositivo', function (Blueprint $table) {
            $table->id('ID_Dispositivo'); // ID con autoincremento
            $table->string('Tipo_Dispositivo')->comment('Tipo de dispositivo'); // Tipo de dispositivo
            $table->string('Ubicacion')->nullable()->comment('Ubicación del dispositivo'); // Ubicación opcional
            $table->string('Estado_Dispositivo')->comment('Estado actual del dispositivo'); // Estado del dispositivo
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispositivo');
    }
}
