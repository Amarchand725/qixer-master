<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Language;



class LanguageController extends Controller
{
    public function languageInfo(){
        
        $languages = Language::select('id','name','slug','direction')->where('default',1)->first()->toArray();
        
        if(!is_null($languages)){
            return response()->success([
                'language'=>$languages,
            ]);
        }
        
        return response()->success([
                'language'=> [ 
                    "slug" => "en_GB",
                    "direction" => "ltr"
                ],
        ]);
    }

    
}
