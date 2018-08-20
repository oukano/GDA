<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Architecte;

class ArchitectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $architecteObj = new Architecte;
        echo $architecteObj::all()->toJson();   
        exit;
    }

    public function update(Request $request, $id)
    {
        $architecteObj = new Architecte;
        //Regrouping recieved data in one array 
            $architecte = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'autorisation' => $request->autorisation,
                'dateAutorisation' => $request->dateAutorisation,
                'region' => $request->region,
                'patente' => $request->patente,
                'tva' => $request->tva,
                'cnss' => $request->cnss,
            ];
        //Replacing null values by empty strings
            $architecte = $this->blank($architecte);
        //Fetching object by id, then updating it with new data and storing it again
            $architecteObj = $architecteObj->find($id);
            $architecteObj->update($architecte);
            echo json_encode($architecteObj);
        exit;
    }

}
