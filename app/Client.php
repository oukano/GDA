<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    //

    public $timestamps=true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'representantLegal', 'prenom','adresse',
        'cin','tel1','tel2','profession','natureJuridique',
        'nationalite','dateNaissance','lieuNaissance',
        'nomPere','nomMere',
    ];

    public function projets()
    {
        return $this->hasMany('App\Projet','idClient');
    }
}
