<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagecontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagecontacts', function (Blueprint $table) {
            $table->id();
            $table->string('t1'); 
            $table->string('desc1'); 
            $table->string('t2'); 
            $table->string('adresse');
            $table->string('tel'); 
            $table->string('email'); 
            $table->string('footer'); 
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
        Schema::dropIfExists('pagecontacts');
    }
}
