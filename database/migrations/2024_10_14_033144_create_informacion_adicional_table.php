<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionAdicionalTable extends Migration
{
    public function up()
    {
        Schema::create('informacion_adicional', function (Blueprint $table) {
            $table->id();

            // Relación con usuario y vehículo
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade')->comment('Relación con la tabla usuarios');
            $table->foreignId('vehiculo_id')->nullable()->constrained('vehiculo')->onDelete('cascade')->comment('Relación opcional con la tabla vehículos');

            // Información adicional
            $table->string('numero_nomina', 20)->nullable()->comment('Número de nómina del usuario');
            $table->string('numero_control', 20)->nullable()->comment('Número de control del usuario');
            $table->string('correo_electronico_alternativo', 100)->nullable()->comment('Correo electrónico alternativo');

            // Declaración de veracidad de la información
            $table->boolean('declara_informacion_veridica')->default(false)->comment('El usuario declara que la información es verídica');
            $table->boolean('cuentas_con_candado')->default(false);

            // Información de local
            $table->string('nombre_local', 100)->nullable()->comment('Nombre del local donde está registrado el usuario');

            // Documentos del usuario
            $table->string('foto_ine_frente')->nullable()->comment('Fotografía de la INE (frente)');
            $table->string('foto_ine_trasera')->nullable()->comment('Fotografía de la INE (trasera)');
            $table->string('foto_tarjeta_circulacion')->nullable()->comment('Fotografía de la tarjeta de circulación');

            // Información de timestamp
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informacion_adicional');
    }
}
