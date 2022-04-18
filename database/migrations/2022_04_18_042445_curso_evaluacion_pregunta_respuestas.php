<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CursoEvaluacionPreguntaRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_evaluacion_pregunta_respuestas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pregunta_id');
            // $table->foreign('pregunta_id')->references('id')->on('curso_evaluacion_preguntas')->onDelete('cascade');

            $table->string("titulo")->nullable();
            $table->boolean("estado")->default(true);

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
        Schema::dropIfExists('curso_evaluacion_pregunta_respuestas');
    }
}
