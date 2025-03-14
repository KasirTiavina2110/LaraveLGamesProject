<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = 'downloads';
    protected $fillable = ['usager_id', 'jeu_id'];

    /**
     * Relation avec l'usager.
     */
    public function usager()
    {
        return $this->belongsTo(Usager::class, 'usager_id');
    }

    /**
     * Relation avec le jeu.
     */
    public function jeu()
    {
        return $this->belongsTo(Jeu::class, 'jeu_id', 'id_jeu');
    }
}
