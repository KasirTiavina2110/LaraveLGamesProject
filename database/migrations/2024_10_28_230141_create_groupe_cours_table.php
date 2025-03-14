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
        Schema::create('groupe_cours', function (Blueprint $table) {
            $table->unsignedBigInteger('groupe_id');
            $table->unsignedBigInteger('cours_id');

            $table->foreign('groupe_id')->references('id_groupe')->on('groupes')->onDelete('cascade');
            $table->foreign('cours_id')->references('id_cours')->on('cours')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('groupe_cours');
    }

};
