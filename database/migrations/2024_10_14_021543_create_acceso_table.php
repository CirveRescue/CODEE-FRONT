<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoTable extends Migration
{
    public function up()
    {
        Schema::create('acceso', function (Blueprint $table) {
            $table->id('ID_Acceso'); // ID con autoincremento
            $table->foreignId('ID_Vehiculo') // Llave foránea
                ->constrained('vehiculo', 'ID_Vehiculo')
                ->onDelete('cascade');
            $table->date('Fecha_Autorizacion')->comment('Fecha de autorización'); // Campo de fecha
            $table->boolean('Autorizado')->comment('Indica si el acceso fue autorizado'); // Campo booleano
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('acceso');
    }
}
