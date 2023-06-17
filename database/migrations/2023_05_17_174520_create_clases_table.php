<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
          $table->id();
          $table->string('titulo')->nullable();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('session_id');

            $table->foreign('curso_id')
                ->references('id')
                ->on('cursos')
                ->onDelete('cascade');

            $table->foreign('session_id')
                ->references('id')
                ->on('cursos_seccione')
                ->onDelete('cascade');

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
        Schema::dropIfExists('clases');
    }
}
