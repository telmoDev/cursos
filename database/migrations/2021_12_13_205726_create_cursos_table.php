<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string("imagen")->nullable();
            $table->string("nombre");
            $table->string("slug");
            $table->text("descripcion_larga");
            $table->string("descripcion_corta");
            $table->string("hora");
            $table->double("precio");
            $table->string("link_video");

            $table->string("seccion_titulo");
            $table->string("seccion_subtitulo");
            $table->string("seccion_link_video");
            $table->string("seccion_detalle");

            $table->unsignedBigInteger('cursos_categoria_id')->nullable();
            $table->foreign('cursos_categoria_id')->references('id')->on('cursos_categorias')->onDelete('cascade');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('cursos');
    }
}
