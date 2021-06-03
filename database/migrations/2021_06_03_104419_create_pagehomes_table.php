<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagehomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagehomes', function (Blueprint $table) {
            $table->id();
            $table->string('t1'); 
            $table->text('desc1'); 
            $table->text('desc2'); 
            $table->string('btn1text'); 
            $table->string('btn1link'); 
            $table->string('imglink'); 
            $table->string('videolink'); 
            $table->string('t2'); 
            $table->string('t3'); 
            $table->string('btn2text'); 
            $table->string('btn2link'); 
            $table->string('t4'); 
            $table->string('t5'); 
            $table->text('desc3'); 
            $table->string('btn3text'); 
            $table->string('btn3link'); 
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
        Schema::dropIfExists('pagehomes');
    }
}
