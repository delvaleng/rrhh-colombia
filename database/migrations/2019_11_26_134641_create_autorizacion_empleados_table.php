<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAutorizacionEmpleadosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizacion_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_marcacion')->default(null);
            $table->integer('creado_by')->default(null);
            $table->integer('aprobado_by')->default(null);
            $table->text('observacion');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_marcacion')->references('id')->on('marcacions');
            $table->foreign('creado_by')->references('id')->on('empleados');
            $table->foreign('aprobado_by')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autorizacion_empleados');
    }
}
