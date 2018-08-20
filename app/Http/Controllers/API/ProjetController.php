<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Projet;
use App\Architecte;

use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
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
        $projetObj = new Projet;
        $architecteObj = new Architecte;
        $architecteObj = $architecteObj::find(1);

        $projets = $projetObj::withCount('document')->get();
        $listProjets = array();
        foreach ($projets as $key => $value) {
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
                'autorisation' => $request->autorisation,
                'cos' => $request->cos,
                'ces' => $request->ces,
                'idAdmin' =>  "1",
                'idClient' => $request->idClient
            ];
        //Replacing null values by empty strings
            $projet = $this->blank($projet);
        //Filling the object and storing data in database  
           $projetObj->fill($projet)->save();
        //Returning the stored object in JSON format
           echo json_encode($projetObj);
            exit;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $projetObj = new Projet;
        $architecteObj = new Architecte;
        $architecteObj = $architecteObj::find(1);

        $projet = $projetObj::withCount('document')->where('id', $id)->get();
        $data = [
            "projet" => $projet[0],
            "client" => $projet[0]->client,
            "architecte" => $architecteObj
        ];
        echo json_encode($data);
        exit;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $projetObj = new Projet;
        //Regrouping recieved data in one array 
            $projet = [
                'nomProjet' => $request->nomProjet,
                'nomProjetAr' => $request->nomProjetAr,
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
                'autorisation' => $request->autorisation,
                'cos' => $request->cos,
                'ces' => $request->ces,
                'idAdmin' => $request->idAdmin,
                'idClient' => $request->idClient
            ];
        //Replacing null values by empty strings
            $projet = $this->blank($projet);
        //Fetching object by id, then updating it with new data and storing it again
            $projetObj = $projetObj->find($id);
            $projetObj->update($projet);
            echo json_encode($projetObj);
        exit;
    }


}