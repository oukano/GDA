<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles = DB::table('modeles')->get();
        /*echo "<pre>";
        echo json_encode($modeles, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($modeles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Regrouping recieved data in one array 
            $modele = [
                'nom' => $request->nom,
                'contenu' => $request->contenu,
                'etapeProjet' => $request->etapeProjet
            ];
        //Cleaning data
            $modele = $this->purify($modele);
        // Storing in database
            DB::table('modeles')->insert($modele);
       
       /* echo "<pre>";
        echo json_encode($modele, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($modele);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modele = DB::table('modeles')->where('id', $id)->first();
        /*echo "<pre>";
        echo json_encode($modele, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($modele);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Regrouping recieved data in one array 
            $modele = [
                'nom' => $request->nom,
                'contenu' => $request->contenu,
                'etapeProjet' => $request->etapeProjet
            ];
        //Cleaning data
            $modele = $this->purify($modele);
        // Storing in database
            DB::table('modeles')->where('id', $id)->update($modele);
       
       /* echo "<pre>";
        echo json_encode($modele, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($modele);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
