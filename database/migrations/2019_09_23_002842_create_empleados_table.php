<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpleadosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tp_documento_identidad')->default(null);
            $table->integer('id_pais')->default(0);
            $table->text('nombre');
            $table->text('apellido');
            $table->text('num_documento');
            $table->text('usuario')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_tp_documento_identidad')->references('id')->on('tp_documento_identidads');
            $table->foreign('id_pais')->references('id')->on('pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
