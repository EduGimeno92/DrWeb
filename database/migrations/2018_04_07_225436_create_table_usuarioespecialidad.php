<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuarioespecialidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioespecialidad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('idusuario')->unsigned();
            $table->integer('idespecialidad')->unsigned();
            $table->primary(['idusuario' , 'idespecialidad']);
            $table->timestamps();
        });
        
        Schema::table('usuarioespecialidad' , function (Blueprint $table) {
           $table->foreign('idusuario')->references('id')->on('usuario');
           $table->foreign('idespecialidad')->references('id')->on('especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarioespecialidad');
    }
}
