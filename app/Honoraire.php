<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honoraire extends Model
{
    //
    protected $fillable = [
        'montant', 'idProjet','checkNbr','type'
    ];

    public function projet()
    {
    return $this->belongsTo('App\Projet', 'idProjet');
    }
}
