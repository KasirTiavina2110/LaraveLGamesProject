<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table = 'jeux';
    protected $primaryKey = 'id_jeu'; // Définir explicitement la clé primaire

    protected $fillable = [
        'titre',
        'description',
        'taille',
        'categorie',
        'realisateur',
        'zip',
    ];

    /**
     * Un jeu peut avoir plusieurs images.
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'jeu_id');
    }

    /**
     * Un jeu peut avoir plusieurs vidéos.
     */
    public function videos()
    {
        return $this->hasMany(Video::class, 'jeu_id');
    }

    /**
     * Un jeu peut avoir plusieurs commentaires.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'jeu_id');
    }

    /**
     * Un jeu peut avoir plusieurs ratings (notes).
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'jeu_id');
    }
    // Méthode pour obtenir la note moyenne du jeu
    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('note');
    }
    public function downloads()
    {
        return $this->hasMany(Download::class, 'jeu_id', 'id_jeu');
    }

}
