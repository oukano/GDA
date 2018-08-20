<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Cycling through the array and cleanings its values
    //trim is for white spaces; strip_tags is for html tags
    public function blank($array) {
    		foreach ($array as $key => $value) {
    			if($value == null) {
    				$array[$key] = '';
    			}
    		}
		return $array;
	}
}

