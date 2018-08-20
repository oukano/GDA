<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = [
        'titre', 'contenu', 'idModel','idProjet'
    ];

    public function projet()
    {
    return $this->belongsTo('App\Projet', 'idProjet');
    }
    public function modele()
    {
    return $this->belongsTo('App\Modele', 'idModel');
    }
}
