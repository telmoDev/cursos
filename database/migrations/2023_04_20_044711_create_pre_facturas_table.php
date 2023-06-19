<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('sa_fac_num');
            $table->boolean('expiro')->default(false);
            $table->boolean('anulado')->default(false);
            $table->dateTime('fecha_creado')->nullable();
            $table->text('url_pago')->nullable();
            $table->string('estado_factura')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('pre_facturas');
    }
}
