<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_contenido_modulo', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("detalle");
            $table->unsignedBigInteger('cursos_contenido_modulos_tipo_id');
            $table->foreign('cursos_contenido_modulos_tipo_id')->references('id')->on('cursos_contenido_modulos_tipo')->onDelete('cascade');

            $table->unsignedBigInteger('cursos_contenido_id');
            $table->foreign('cursos_contenido_id')->references('id')->on('cursos_contenido')->onDelete('cascade');

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
        Schema::dropIfExists('cursos_contenido_modulo');
    }
}
