<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $table = 'cours';
    /**
     * Un cours peut être associé à plusieurs groupes.
     * Relation many-to-many avec le modèle Groupe via la table pivot groupe_cours.
     */
    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'groupe_cours', 'cours_id', 'groupe_id');
    }
}
