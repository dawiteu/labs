<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom'); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->default('img/def/noav2.png'); 
            $table->string('description');
            $table->foreignId('role_id')->constrained('roles', 'id'); 
            $table->foreignId('poste_id')->constrained('postes', 'id');
            $table->integer('active')->default('0'); // par def on ne les active pas // secu // 
            $table->integer('deleted')->default('0'); // si un user se 'supprime' 
            $table->foreignId('created_by')->constrained('users','id'); // par qui il a ete cree? pas de soucis avec cascade del car AUCUN utilisateur est drop de la db
            $table->string('login_token'); 
            $table->string('def_pass'); 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
