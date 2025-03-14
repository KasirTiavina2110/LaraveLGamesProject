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
        Schema::create('jeux', function (Blueprint $table) {
            $table->id('id_jeu');
            $table->string('titre');
            $table->text('description');
            $table->integer('taille'); // en MB ou GB
            $table->string('realisateur'); // Ajout du réalisateur
            $table->string('categorie');
            $table->string('zip'); // chemin vers fichier compressé
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jeux');

    }

};
