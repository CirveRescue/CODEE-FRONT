<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculoTable extends Migration
{
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->id('ID_Vehiculo'); // ID del vehículo con autoincremento
            $table->foreignId('ID_Usuario') // Llave foránea hacia Usuario
                ->constrained('usuario', 'ID_Usuario')
                ->onDelete('cascade');
            $table->string('Placa')->unique()->comment('Placa del vehículo, única'); // Placa única
            $table->string('Modelo')->nullable()->comment('Modelo del vehículo'); // Modelo del vehículo, opcional
            $table->string('Color')->nullable()->comment('Color del vehículo'); // Color del vehículo, opcional
            $table->integer('Año')->nullable()->comment('Año del vehículo'); // Año del vehículo, opcional
            $table->integer('Tipo')->nullable()->comment('Tipo de vehículo'); // Tipo de vehículo
            $table->string('Fotografia')->nullable()->comment('Ruta de la fotografía del vehículo'); // Ruta de la fotografía del vehículo
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
}
