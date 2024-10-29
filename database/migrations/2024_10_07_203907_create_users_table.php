<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Correo electrónico único
            $table->string('password'); // Contraseña
            $table->integer('id_role');//roles
            $table->rememberToken(); // Token para recordar la sesión
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
