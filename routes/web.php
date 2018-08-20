<?php

use Illuminate\Http\Request;
use \Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('bordView');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/apiClient', 'API\ClientController');
Route::resource('/apiProjet', 'API\ProjetController');
Route::resource('/apiDocument', 'API\DocumentController');
Route::resource('/apiModele', 'API\ModeleController');
Route::resource('/apiPaiment', 'API\HonoraireController');

// Route::get('/pdf/{id}', 'RouterController@projetForm');
Route::post('/pdf',function( Request $request){

// echo $request->contenu;
        $mpdf = new Mpdf();
        $mpdf->SetMargins(0, 0, 0);
        $mpdf->autoScriptToLang = true;
			$mpdf->autoLangToFont = true;
		//Creating document
			$mpdf->WriteHTML( $request->contenu);
			$mpdf->Output();

    

});

Route::get('bord', 'RouterController@bordView')->name('bordView');
Route::get('projets', 'RouterController@projetsView')->name('projetsView');

Route::get('projets/{id}', function($id){
    return view("main/projetView",['id'=>$id]);
})->name('projetView');


Route::get('modeles/{id}', function($id){
    return view("main/modeleView",['id'=>$id]);
})->name('modeleView');

Route::get('documents/{id}', function($id){
    return view("main/documentView",['id'=>$id]);
})->name('documentView');

Route::get('clients/{id}', function($id){
    return view("main/clientView",['id'=>$id]);
})->name('clientView');


Route::get('documents', 'RouterController@documentsView')->name('documentsView');
Route::get('modeles', 'RouterController@modelesView')->name('modelesView');
Route::get('clients', 'RouterController@clientsView')->name('clientsView');
Route::get('paiments', 'RouterController@paimentsView')->name('paimentsView');
