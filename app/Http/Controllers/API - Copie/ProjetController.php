<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Projet;
use App\Architecte;

use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projetObj = new Projet;
        $architecteObj = new Architecte;
        $architecteObj = $architecteObj::find(1);

        $projets = $projetObj::withCount('document')->get();
        $listProjets = array();
        foreach ($projets as $key => $value) {
            /*$listProjets[$key]['id'] = $value->id;
            $listProjets[$key]['nomProjet'] = $value->nomProjet;
            $listProjets[$key]['nomClient'] = $value->client->nom . "" . $value->client->prenom;
            $listProjets[$key]['nbrDocuments'] = $value->document_count;
            $listProjets[$key]['honoraire'] = $value->honoraire->sum('montant');*/

            $listProjets[$key] = [
                "projet" => $value,
                "client" => $value->client,
                "données" => [
                    "nbrDocuments" => $value->document_count,
                    "honoraire" => $value->honoraire->sum('montant')
                ]
            ];

        }
        $data = [
            "listProjets" => $listProjets,
            "architecte" => $architecteObj
        ];
        echo json_encode($data);
        exit;
    }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "d".Auth::id();
        $projetObj = new Projet;
        //Regrouping recieved data in one array 
            $projet = [
                'nomProjet' => $request->nomProjet,
                'etat' => $request->etat,
                'prix' => $request->prix,
                'delaiRealisation' => $request->delaiRealisation,
                'type' => $request->type,
                'nature' => $request->nature,
                'situationTerrain' => $request->situationTerrain,
                'commune' => $request->commune,
                'surfaceTotale' => $request->surfaceTotale,
                'surfaceDemande' => $request->surfaceDemande,
                'surfaceBatie' => $request->surfaceBatie,
                'surfacePlancher' => $request->surfacePlancher,
                'titreFoncier' => $request->titreFoncier,
                'nbrPiecesHabitables' => $request->nbrPiecesHabitables,
                'nbrLogement' => $request->nbrLogement,
                'cos' => $request->cos,
                'ces' => $request->ces,
                'idAdmin' =>  "1",
                'idClient' => $request->idClient
            ];
        // //Filling the object and storing data in database  
           $projetObj->fill($projet)->save();
        // //Returning the stored object in JSON format
           return $projetObj;
        //  return "done";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $projetObj = new Projet;
        //Fetching object by id
            return $projetObj->find($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $projetObj = new Projet ;
        //Regrouping recieved data in one array 
            $projet = [
                'nomProjet' => $request->nomProjet,
                'etat' => $request->etat,
                'prix' => $request->prix,
                'delaiRealisation' => $request->delaiRealisation,
                'type' => $request->type,
                'nature' => $request->nature,
                'situationTerrain' => $request->situationTerrain,
                'commune' => $request->commune,
                'surfaceTotale' => $request->surfaceTotale,
                'surfaceDemande' => $request->surfaceDemande,
                'surfaceBatie' => $request->surfaceBatie,
                'surfacePlancher' => $request->surfacePlancher,
                'titreFoncier' => $request->titreFoncier,
                'nbrPiecesHabitables' => $request->nbrPiecesHabitables,
                'nbrLogement' => $request->nbrLogement,
                'cos' => $request->cos,
                'ces' => $request->ces,
                'idAdmin' => $request->idAdmin,
                'idClient' => $request->idClient
            ];
        //Fetching object by id, then updating it with new data and storing it again
            $projetObj = $projetObj->find($id);
            $projetObj->update($projet);
            echo json_encode($projetObj);
        exit;
    }

}