<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectDelivery;
use App\ProjectDetails;
use Auth;

class ProjectDeliveryController extends Controller
{
    public function delivery(Request $reqeuest)
    {
        $project_detail = ProjectDetails::with('hasDeliveries')->where('id', $reqeuest->milestone_id)->first();
        

        if(Auth::user()->user_type==0){
            return (string) view('frontend.user.seller.activity.delivery', compact('project_detail'));
        }elseif(Auth::user()->user_type==1){
            return (string) view('frontend.user.buyer.activity.delivery', compact('project_detail'));
        }
    }
    public function store(Request $request)
    {
        if(Auth::user()->user_type==0){
            $validator = $request->validate([
                'attachment' => 'required',
            ]);

            $model = new ProjectDelivery();

            if($request->file('attachment')) {
                $attachment = date('d-m-Y-His').'.'.$request->file('attachment')->getClientOriginalExtension();
                $request->attachment->move(public_path('/assets/delivery/attachments'), $attachment);
                $model->attachment = $attachment;
            }

            $model->project_detial_id = $request->project_details_id;
            $model->describe = $request->describe;
            $model->date = date('Y-m-d');
            $model->is_client_read = 0;
            $model->save();

            $project_detail = ProjectDetails::where('id', $request->project_details_id)->first();
            return (string) view('frontend.user.seller.activity.delivery', compact('project_detail'));
        }elseif(Auth::user()->user_type==1){
            $model = ProjectDelivery::find($request->delivery_id);
            $model->describe = '<strong>Seller: </strong>'.$model->describe.'<br /><strong>Client: </strong>'.$request->describe;
            $model->status = $request->status;
            $model->date = date('Y-m-d');
            $model->is_seller_read = 0;
            $model->save();

            $project_detail = ProjectDetails::where('id', $model->project_detial_id)->first();
            return (string) view('frontend.user.buyer.activity.delivery', compact('project_detail'));
        }
    }
}
