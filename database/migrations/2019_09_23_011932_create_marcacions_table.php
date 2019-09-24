<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarcacionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_empleado')->default(null);
            $table->integer('id_tp_marcacion')->default(null);
            $table->date('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin'->nullable());
            $table->double('total_min')->nullable();
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
            $table->text('observacion')->nullable();

            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->foreign('id_tp_marcacion')->references('id')->on('tp_marcacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('marcacions');
    }
}
