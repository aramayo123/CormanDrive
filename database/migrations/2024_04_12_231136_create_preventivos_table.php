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
        Schema::create('preventivos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente')->nullable();
            $table->string('sucursal')->nullable();
            $table->string('fecha')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('personal_asignado')->nullable();
            $table->string('url_carpeta')->nullable();
            $table->integer('certificado')->nullable();
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
        Schema::dropIfExists('preventivos');
    }
};
