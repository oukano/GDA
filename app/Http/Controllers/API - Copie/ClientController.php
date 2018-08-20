<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;




class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientObj = new Client;
        return $clientObj::all()->toJson();   
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
                'nomMere' => $request->nomMere
            ];
        //Filling the object and storing data in database  
           $clientObj->fill($client)->save();
        //Returning the stored object in JSON format
            return $clientObj->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clientObj = new Client;
        //Fetching object by id
            return $clientObj->find($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $clientObj = new Client;
        // //Regrouping recieved data in one array 
        //     $client = [
        //         'nom' => $request->nom,
        //         'prenom' => $request->prenom,
        //         'adresse' => $request->adresse,
        //         'cin' => $request->cin,
        //         'tel1' => $request->tel1,
        //         'tel2' => $request->tel2,
        //         'profession' => $request->profession,
        //         'representantLegal' => $request->representantLegal,
        //         'natureJuridique' => $request->natureJuridique,
        //         'nationalite' => $request->nationalite,
        //         'dateNaissance' => $request->dateNaissance,
        //         'lieuNaissance' => $request->lieuNaissance,
        //         'nomPere' => $request->nomPere,
        //         'nomMere' => $request->nomMere
        //     ];
        // //Fetching object by id, then updating it with new data and storing it again
        //     $clientObj->find($id)->fill($client)->save();
        // return $clientObj->toJson();
        echo "heyy";
    }

}