<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupeEtudiant extends Model
{
    protected $table = 'groupe_etudiants';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'groupe_id', 'usager_id'
    ];

    /**
     * Un groupe étudiant appartient à un groupe.
     * Relation inverse many-to-one avec le modèle Groupe.
     */
    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'groupe_id');
    }

    /**
     * Un groupe étudiant appartient à un usager.
     * Relation inverse many-to-one avec le modèle Usager.
     */
    public function usager()
    {
        return $this->belongsTo(Usager::class, 'usager_id');
    }
}
