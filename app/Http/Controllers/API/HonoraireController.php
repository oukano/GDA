<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Honoraire;

class HonoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $honoraireObj = new Honoraire;
        $honoraires = $honoraireObj::all();
        $listHonoraires = array();
        foreach ($honoraires as $key => $value) {
            $listHonoraires[$key] = $value;
            $listHonoraires[$key]["nomProjet"] = $value->projet["nomProjet"];
            unset($listHonoraires[$key]["projet"]);
        }
        echo json_encode($listHonoraires);
        exit;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $honoraireObj = new Honoraire;
        //Regrouping recieved data in one array 
            $honoraire = [
                'montant' => $request->montant,
                'idProjet' => $request->idProjet,
                'checkNbr' => $request->checkNbr,
                'type' => $request->type,
            ];
        //Replacing null values by empty strings
            $honoraire = $this->blank($honoraire);
        //Filling the object and storing data in database  
           $honoraireObj->fill($honoraire)->save();
        //Returning the stored object in JSON format
           echo json_encode($honoraireObj);
        exit;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $honoraireObj = new Honoraire;
        //Fetching object by id
            echo $honoraireObj->find($id)->toJson();
            exit;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $honoraireObj = new Honoraire;
        //Regrouping recieved data in one array 
            $honoraire = [
                'montant' => $request->montant,
                'idProjet' => $request->idProjet,
                'checkNbr' => $request->checkNbr,
                'type' => $request->type,
                
                
            ];
        //Replacing null values by empty strings
            $honoraire = $this->blank($honoraire);
        //Fetching object by id, then updating it with new data and storing it again
            $honoraireObj = $honoraireObj->find($id);
            $honoraireObj->update($honoraire);
            echo json_encode($honoraireObj);
        exit;
    }
}
