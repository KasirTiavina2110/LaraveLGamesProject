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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('id_rating');
            $table->unsignedBigInteger('jeu_id');
            $table->unsignedBigInteger('usager_id');
            $table->integer('note')->check('note >= 0 AND note <= 5');
            $table->timestamps();

            $table->foreign('jeu_id')->references('id_jeu')->on('jeux')->onDelete('cascade');
            $table->foreign('usager_id')->references('id')->on('usagers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }

};
