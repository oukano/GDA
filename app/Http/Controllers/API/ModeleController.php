<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modele;

class ModeleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeleObj = new Modele;
        $modeles = $modeleObj::withCount('documents')->get();
        echo $modeles->toJson();
        exit;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $modeleObj = new Modele;
        //Regrouping recieved data in one array 
            $modele = [
                'nom' => $request->nom,
                'contenu' => $request->contenu,
                'etapeProjet' => $request->etapeProjet
            ];
        //Replacing null values by empty strings
            $modele = $this->blank($modele);
        //Filling the object and storing data in database  
           $modeleObj->fill($modele)->save();
        //Returning the stored object in JSON format
           echo json_encode($modeleObj);
        exit;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $modeleObj = new Modele;
        //Fetching object by id
            return $modeleObj->find($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $modeleObj = new Modele;
        //Regrouping recieved data in one array 
            $modele = [
                'nom' => $request->nom,
                'contenu' => $request->contenu,
                'etapeProjet' => $request->etapeProjet
            ];
        //Replacing null values by empty strings
            $modele = $this->blank($modele);
        //Fetching object by id, then updating it with new data and storing it again
            $modeleObj = $modeleObj->find($id);
            $modeleObj->update($modele);
            echo json_encode($modeleObj);
        exit;
    }
}
