<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEntradaTable extends Migration
{
    public function up()
    {
        Schema::create('entrada', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculo')->onDelete('cascade');
            // Aquí corregimos la referencia para usar el nombre correcto de la clave primaria
            $table->foreignId('usuario_id')->constrained('usuario', 'ID_Usuario')->onDelete('cascade');
            $table->foreignId('acceso_id')->constrained('acceso')->onDelete('cascade');
            $table->timestamp('fecha_entrada')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrada');
    }
}
