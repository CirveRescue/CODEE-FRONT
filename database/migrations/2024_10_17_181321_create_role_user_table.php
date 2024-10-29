<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Referencia a la tabla 'users'
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');  // Referencia a la tabla 'roles'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
