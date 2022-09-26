<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Language;


class MiscellaneousController extends Controller
{
    public function currencyInfo(){
        
        return response()->success([
            'currency'=> [ 
                "symbol" => site_currency_symbol(),
                "position" => get_static_option('site_currency_symbol_position')
            ],
        ]);
    }

    
}
