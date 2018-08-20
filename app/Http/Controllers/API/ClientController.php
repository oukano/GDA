<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Projet;




class ClientController extends Controller
{   
    /**
     * Show the application dashboard.
     */
    
    public function index()
    {
        $clientObj = new Client;
        $clients = $clientObj::all();
        $listClients = array();
        foreach ($clients as $cKey => $cValue) {
            $listClients[$cKey] = $cValue;
            $projets = $cValue->projets;

            foreach ($projets as $pKey => $pValue) {
                $listClients[$cKey]["projets"][$pKey] = [
                    "nomProjet" => $pValue->nomProjet,
                    "honoraire" => $pValue->honoraire->sum('montant')
                ];
            }
        }
        echo json_encode($listClients);
        exit;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientObj = new Client;
        //Regrouping recieved data in one array 
            $client = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse,
                'cin' => $request->cin,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'profession' => $request->profession,
                'representantLegal' => $request->representantLegal,
                'natureJuridique' => $request->natureJuridique,
                'nationalite' => $request->nationalite,
                'dateNaissance' => $request->dateNaissance,
                'lieuNaissance' => $request->lieuNaissance,
                'nomPere' => $request->nomPere,
                'nomMere' => $request->nomMere,
            ];
        //Replacing null values by empty strings
            $client = $this->blank($client);
        //Filling the object and storing data in database  
           $clientObj->fill($client)->save();
        //Returning the stored object in JSON format
           echo json_encode($clientObj);
        exit;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clientObj = new Client;
        //Fetching object by id
            echo $clientObj->find($id)->toJson();
            exit;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clientObj = new Client;
        //Regrouping recieved data in one array 
            $client = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse,
                'cin' => $request->cin,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'profession' => $request->profession,
                'representantLegal' => $request->representantLegal,
                'natureJuridique' => $request->natureJuridique,
                'nationalite' => $request->nationalite,
                'dateNaissance' => $request->dateNaissance,
                'lieuNaissance' => $request->lieuNaissance,
                'nomPere' => $request->nomPere,
                'nomMere' => $request->nomMere
            ];
        //Replacing null values by empty strings
            $client = $this->blank($client);
        //Fetching object by id, then updating it with new data and storing it again
            $clientObj = $clientObj->find($id);
            $clientObj->update($client);
            echo json_encode($clientObj);
        exit;
    }

}