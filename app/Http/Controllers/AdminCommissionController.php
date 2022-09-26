<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\AdminCommission;

class AdminCommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin-commission',['only' => ['admin_commission_all']]);
        $this->middleware('permission:admin-commission',['only' => ['admin_commission_all']]);
    }

    public function admin_commission_all(){
        $commission =AdminCommission::first();
        return view('backend.pages.admin-commission.admin-commission-all',compact('commission'));
    }

    public function admin_commission_update(Request $request,$id=null){
        $request->validate([
            'commission_charge_type'=> 'required|max:191',
            'commission_charge'=> 'required|numeric',
            
        ]);

        if(!empty($id)){
            AdminCommission::where('id',$id)->update([
                'commission_charge_type'=>$request->commission_charge_type,
                'commission_charge'=>$request->commission_charge,
            ]);
        }else{
            AdminCommission::create([
                'commission_charge_from' => $request->commission_charge_from,
                'commission_charge_type' => $request->commission_charge_type,
                'commission_charge' => $request->commission_charge,
            ]);
        }
        return redirect()->back()->with(FlashMsg::item_new(__('Update Success')));
    }
}
