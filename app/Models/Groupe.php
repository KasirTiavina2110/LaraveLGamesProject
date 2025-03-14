<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $table = 'groupes';
    protected $primaryKey = 'id_groupe'; // préciser la clé primaire personnalisée

    public $incrementing = true; // si c’est un AUTO_INCREMENT
    public $timestamps = true; // si vous utilisez bien created_at/updated_at
    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'nom'
    ];

    /**
     * Un groupe peut avoir plusieurs usagers (étudiants).
     * Relation many-to-many avec le modèle Usager.
     */
    public function usagers()
    {
        return $this->belongsToMany(Usager::class, 'groupe_etudiants', 'groupe_id', 'usager_id');
    }

    /**
     * Un groupe peut avoir plusieurs cours.
     * Relation many-to-many avec le modèle Cours.
     */
    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'groupe_cours', 'groupe_id', 'cours_id');
    }
}
