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
        Schema::create('videos', function (Blueprint $table) {
            $table->id('id_video');
            $table->unsignedBigInteger('jeu_id');
            $table->string('url',1024);
            $table->timestamps();

            $table->foreign('jeu_id')->references('id_jeu')->on('jeux')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('videos');
    }

};
