<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Architecte extends Model
{
    //
    protected $fillable = [
        'nom', 'prenom', 'adresse','tel1','tel2',
        'autorisation','dateAutorisation','region',
        'patente','tva','cnss'
    ];
}
