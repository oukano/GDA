<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use \Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class RouterController extends Controller
{
    public function clientForm() {
        return view('client'); 
    }
    public function projetForm() {
    		//return view('projet');
    }
    public function pdf($id) {
		// echo $id;
    		$defaultConfig = (new ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];

		/*$mpdf = new Mpdf([
		    'fontDir' => $fontDirs,
		    'fontdata' => $fontData + [
		        'Palace Script MT' => [
		            'R' => 'PALSCRI.ttf',
		        ]
		    ],
		    'default_font' => 'Palace Script MT'
		]);*/

    		// Creating pdf & document Objects
	    		$mpdf = new Mpdf();
	    		$mpdf->SetMargins(0, 0, 0);
	    		$docObj = new Document;
	    	//Fetching the document content
	  		$doc = $docObj::find($id);
	  		$content = $doc->contenu;
  		//Setting-up Arabic language 
	  		$mpdf->autoScriptToLang = true;
			$mpdf->autoLangToFont = true;
		//Creating document
			$mpdf->WriteHTML($content);
			$mpdf->Output();
    }

    //Functions that redirect to the main page of each section
	    public function bordView() {
	    		return view('main.bordView');
	    }

	    public function projetsView() {
	    		return view('main.projetsView');
	    }

	    public function documentsView() {
	    		return view('main.documentsView');
	    }

	    public function modelesView() {
	    		return view('main.modelesView');
	    }

	    public function clientsView() {
	    		return view('main.clientsView');
	    }

	    public function paimentsView() {
			return view('main.paimentsView');
		}

}