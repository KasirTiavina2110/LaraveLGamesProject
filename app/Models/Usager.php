<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usagers';

    /**
     * Champs pouvant être modifiés en masse.
     */
    protected $fillable = [
        'matricule',
        'type_usager',
        'email',
        'mdp',
        'programme',
        'nom',
        'prenom',
    ];

    /**
     * Champs masqués dans les réponses JSON.
     */
    protected $hidden = [
        'mdp',
        'remember_token',
    ];

    /**
     * Champs castés en types natifs.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Méthode pour retourner le mot de passe.
     * Obligatoire pour l'authentification Laravel.
     */
    public function getAuthPassword()
    {
        return $this->mdp;
    }

    /**
     * Relation : Un usager peut avoir plusieurs commentaires.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'usager_id');
    }

    /**
     * Relation : Un usager peut avoir plusieurs notes (ratings).
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'usager_id');
    }

    /**
     * Suppression en cascade des commentaires et des notes liés.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($usager) {
            // Supprime les commentaires liés
            $usager->commentaires()->delete();

            // Supprime les notes liées
            $usager->ratings()->delete();
        });
    }

        /**
     * Relation Many-to-Many entre Usager et Groupe.
     * Un usager peut appartenir à plusieurs groupes.
     */
    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'groupe_etudiants', 'usager_id', 'groupe_id');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class, 'usager_id');
    }

}
