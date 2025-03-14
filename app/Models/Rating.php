<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'jeu_id', 'usager_id', 'note'
    ];

    /**
     * Une note appartient à un jeu.
     * Relation inverse one-to-many avec le modèle Jeu.
     */
    public function jeu()
    {
        return $this->belongsTo(Jeu::class, 'jeu_id','id_jeu');
    }

    /**
     * Une note appartient à un usager.
     * Relation inverse one-to-many avec le modèle Usager.
     */
    public function usager()
    {
        return $this->belongsTo(Usager::class, 'usager_id', 'id');
    }
}
