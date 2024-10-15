<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Asegúrate de que esta línea esté presente

class CreateEventoTable extends Migration
{
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->id('ID_Evento'); // ID del evento con autoincremento
            $table->foreignId('ID_Vehiculo') // Llave foránea hacia Vehiculo
                ->constrained('vehiculo', 'ID_Vehiculo')
                ->onDelete('cascade');
            $table->foreignId('ID_Dispositivo') // Llave foránea hacia Dispositivo
                ->constrained('dispositivo', 'ID_Dispositivo')
                ->onDelete('cascade');
            $table->timestamp('Fecha_Evento')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Fecha del evento'); // Fecha del evento
            $table->boolean('Resultado_Deteccion')->comment('Resultado de la detección'); // Resultado booleano de la detección
            $table->string('Accion')->nullable()->comment('Acción realizada'); // Acción realizada, opcional
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('evento');
    }
}
