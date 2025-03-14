<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupeCours extends Model
{
    protected $table = 'groupe_cours';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'groupe_id', 'cours_id'
    ];

    /**
     * Un groupe-cours appartient à un groupe.
     * Relation inverse many-to-one avec le modèle Groupe.
     */
    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'groupe_id');
    }

    /**
     * Un groupe-cours appartient à un cours.
     * Relation inverse many-to-one avec le modèle Cours.
     */
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
