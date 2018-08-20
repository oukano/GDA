<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentObj = new Document;
        $documents = $documentObj::where('id', '>', 0)->orderBy('created_at')->take(100)->get();
        foreach ($documents as $key => $value) {
            $value['nomProjet'] = $value->projet->nomProjet;
            $value['nomModele'] = $value->modele->nom;
            $value['nomClient'] = $value->projet->client->nom;
            unset($value['contenu'], $value['projet'], $value['modele'], $value['client']);
        }
        echo $documents;
        exit;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documentObj = new Document;
        //Regrouping recieved data in one array 
            $document = [
                'titre' => $request->titre,
                'contenu' => $request->contenu,
                'langue' => $request->langue,
                'idProjet' => $request->idProjet,
                'idModel' => $request->idModel
            ];
        //Replacing null values by empty strings
            $document = $this->blank($document);
        //Filling the object and storing data in database  
           $documentObj->fill($document)->save();
        //Returning the stored object in JSON format
           echo json_encode($documentObj);
        exit;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $documentObj = new Document;
        //Fetching object by id
            return $documentObj->find($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $documentObj = new Document;
        //Regrouping recieved data in one array 
            $document = [
                'titre' => $request->titre,
                'contenu' => $request->contenu,
                'langue' => $request->langue,
                'idProjet' => $request->idProjet,
                'idModel' => $request->idModel
            ];
        //Replacing null values by empty strings
            $document = $this->blank($document);
        //Fetching object by id, then updating it with new data and storing it again
            $documentObj = $documentObj->find($id);
            $documentObj->update($document);
            echo json_encode($documentObj);
        exit;
    }
}
