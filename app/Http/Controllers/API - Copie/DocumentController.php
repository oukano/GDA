<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = DB::table('documents')->get();
        /*echo "<pre>";
        echo json_encode($documents, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($documents);
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
            $document = [
                'titreFr' => $request->titreFr,
                'titreAr' => $request->titreAr,
                'contenuFr' => $request->contenuFr,
                'contenuAr' => $request->contenuAr,
                'idProjet' => $request->idProjet,
                'idModel' => $request->idModel
            ];
        //Cleaning data
            $document = $this->purify($document);
        // Storing in database
            DB::table('documents')->insert($document);
       
       /* echo "<pre>";
        echo json_encode($document, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($document);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = DB::table('documents')->where('id', $id)->first();
        /*echo "<pre>";
        echo json_encode($document, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($document);
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
            $document = [
                'titreFr' => $request->titreFr,
                'titreAr' => $request->titreAr,
                'contenuFr' => $request->contenuFr,
                'contenuAr' => $request->contenuAr,
                'idProjet' => $request->idProjet,
                'idModel' => $request->idModel
            ];
        //Cleaning data
            $document = $this->purify($document);
        // Storing in database
            DB::table('documents')->where('id', $id)->update($document);
       
       /* echo "<pre>";
        echo json_encode($document, JSON_PRETTY_PRINT);
        echo "</pre>";*/
        return json_encode($document);
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
