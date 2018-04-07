<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConsultorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultorio', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('idProvincia')->unsigned();//llave primaria de localidad
            $table->integer('idLocalidad')->unsigned();//llave primaria de localidad
            $table->integer('idConsultorio')->unsigned();
            $table->string('razonSocial');
            $table->string('direccion');
            $table->primary(['idProvincia','idLocalidad','idConsultorio']);//crea la clave primaria compuesta para que este todo ordenado.
            $table->timestamps();
        });
        
        Schema::table('consultorio' , function (Blueprint $table) {
            //crea la clave foranea compuesta de localidad 
           $table->foreign(['idProvincia','idLocalidad'])->references(['idProvincia','idLocalidad'])->on('localidad'); 
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultorio');
    }
}
