<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomProjet', 'etat', 'prix','delaiRealisation',
        'type','nature','situationTerrain','commune',
        'surfaceTotale','surfaceDemande','surfaceBatie',
        'surfacePlancher','titreFoncier','nbrPiecesHabitables',
        'nbrLogement', 'autorisation', 'cos','ces','idAdmin','idClient',


    ];

    public function document()
    {
        return $this->hasMany('App\Document','idProjet');
    }

    public function honoraire()
    {
        return $this->hasMany('App\Honoraire','idProjet');
    }

    public function client()
    {
    return $this->belongsTo('App\Client', 'idClient');
    }

    public function admin()
    {
    return $this->belongsTo('App\User', 'idAdmin');
    }
}

