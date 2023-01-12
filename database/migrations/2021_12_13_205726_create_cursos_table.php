<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

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
            $table->double("precio");
            $table->integer("num_inscritos")->default(0);
            $table->text("descripcion_referencia")->nullable();

            // bloque 1
            $table->string("bloque1_titulo")->nullable();
            $table->string("bloque1_subtitulo")->nullable();
            $table->text("bloque1_detalle")->nullable();
            $table->string("bloque1_recurso")->nullable();
            $table->boolean("bloque1_activo")->default(false);

            // bloque 2
            $table->string("bloque2_titulo")->nullable();
            $table->string("bloque2_subtitulo")->nullable();
            $table->text("bloque2_detalle")->nullable();
            $table->boolean("bloque2_activo")->default(false);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('cursos_categoria_id');
            $table->foreign('cursos_categoria_id')->references('id')->on('cursos_categorias')->onDelete('cascade');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');

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
