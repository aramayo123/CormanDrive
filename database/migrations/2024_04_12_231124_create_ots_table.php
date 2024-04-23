<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ots', function (Blueprint $table) {
            $table->id();
            $table->string('remedit')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('elementos_afectados')->nullable();
            $table->string('acciones_ejecutadas')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('cliente')->nullable();
            $table->string('sucursal')->nullable();
            $table->string('personal_asignado')->nullable();
            $table->string('fecha_abierto')->nullable();
            $table->string('fecha_cerrado')->nullable();
            $table->string('url_carpeta')->nullable();
            $table->string('estado')->nullable();
            $table->string('presupuesto')->nullable();
            $table->integer('combustible')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ots');
    }
};
