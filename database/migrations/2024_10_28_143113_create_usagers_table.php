<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('usagers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('matricule')->unique();
            $table->string('type_usager'); // étudiant/professeur
            $table->string('email')->unique();
            $table->string('mdp'); // mot de passe
            $table->string('programme')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->rememberToken(); // Token pour se souvenir de l'utilisateur
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usagers');
    }

};
