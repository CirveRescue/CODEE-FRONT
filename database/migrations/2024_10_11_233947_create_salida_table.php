<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Asegúrate de que esta línea esté presente

class CreateSalidaTable extends Migration
{
    public function up()
    {
        Schema::create('salida', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculo')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');
            $table->foreignId('acceso_id')->constrained('acceso')->onDelete('cascade');
            $table->timestamp('fecha_salida')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salida');
    }
}
