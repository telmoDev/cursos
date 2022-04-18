<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CursoEvaluacionPreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_evaluacion_preguntas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('curso_evaluacion_id');
            $table->foreign('curso_evaluacion_id')->references('id')->on('curso_evaluacion')->onDelete('cascade');

            $table->unsignedBigInteger('respuesta_correcta_id')->nullable();
            $table->foreign('respuesta_correcta_id')->references('id')->on('curso_evaluacion_pregunta_respuestas')->onDelete('cascade');

            $table->string("titulo")->nullable();
            $table->boolean("estado")->default(true);

            $table->timestamps();
        });


        Schema::table('curso_evaluacion_pregunta_respuestas', function (Blueprint $table) {
            $table->foreign('pregunta_id')->references('id')->on('curso_evaluacion_preguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_evaluacion_preguntas');
    }
}
