<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\AmountSettings;

class AmountSettingsController extends Controller
{
    public function amount_settings()
    {
        $amount_settings =AmountSettings::first();
        return view('backend.pages.amount-settings.amount-settings',compact('amount_settings'));
    }

    public function amount_settings_update(Request $request,$id=null)
    {
        $request->validate([
            'min_amount'=> 'required|numeric',
        ]);

        if(!empty($id)){
            AmountSettings::where('id',$id)->update([
               'min_amount' => $request->min_amount,
               'max_amount' => $request->max_amount,
            ]);
        }else{
            AmountSettings::create([
               'min_amount' => $request->min_amount,
               'max_amount' => $request->max_amount,
            ]);
        }
        return redirect()->back()->with(FlashMsg::item_new(__('Update Success')));
    }
}
