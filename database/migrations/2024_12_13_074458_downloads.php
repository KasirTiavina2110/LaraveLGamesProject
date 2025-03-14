<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Downloads extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->unsignedBigInteger('usager_id'); // Référence à l'utilisateur
            $table->unsignedBigInteger('jeu_id');   // Référence au jeu
            $table->timestamps(); // created_at et updated_at

            // Foreign keys
            $table->foreign('usager_id')->references('id')->on('usagers')->onDelete('cascade');
            $table->foreign('jeu_id')->references('id_jeu')->on('jeux')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
}
