<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'jeu_id', 'url'
    ];

    /**
     * Une image appartient à un jeu.
     * Relation inverse one-to-many avec le modèle Jeu.
     */
    public function jeu()
    {
        return $this->belongsTo(Jeu::class, 'jeu_id', 'id_jeu');
    }
}
