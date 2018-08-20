<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    //
    protected $fillable = [
        'nom', 'contenu', 'langue', 'etapeProjet'
    ];

    public function documents()
    {
        return $this->hasMany('App\Document','idModel');
    }
}
