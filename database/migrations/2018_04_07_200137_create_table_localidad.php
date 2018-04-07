<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLocalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('idProvincia')->unsigned();
            $table->integer('idLocalidad')->unsigned();
            $table->string('descripcion')->unique();
            $table->primary(['idProvincia','idLocalidad']);
            $table->timestamps();
        });
        
        Schema::table('localidad' , function (Blueprint $table) {
            $table->foreign('idProvincia')->references('id')->on('provincia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidad');
    }
}
