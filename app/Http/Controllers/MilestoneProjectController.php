<?php

namespace App\Http\Controllers;

use App\MilestoneProject;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\Project;
use Str;

class MilestoneProjectController extends Controller
{
    public function index(){
        $projects = MilestoneProject::all();
        return view('backend.pages.milestone_project.index',compact('projects'));
    }

    public function add_new_project(Request $request)
    {
        if($request->isMethod('post')){ 

            $model = new MilestoneProject();
            foreach($request->milestone_names as $key=>$item){
                if($files = $request->file('milestone_attachments')){
                    $attachement = date('d-m-Y-His').'.'.$files[$key]->extension();
                    $files[$key]->move(public_path('/assets/backend/milestone-attachments'), $attachement);
                    $model->attachment = $attachement;
                }

                $model->requirement_id = $request->requirement_id;
                $model->service_provider_id = $request->milestone_service_providers[$key];
                $model->name = $request->milestone_names[$key];
                $model->cost = $request->milestone_costs[$key];
                $model->service_provider_cost = $request->milestone_service_provider_costs[$key];
                $model->timeframe = $request->milestone_timeframes[$key];
                $model->description = $request->milestone_descriptions[$key];
                $model->status = $request->milestone_statuses[$key];
                $model->save();
            }
    
           return redirect()->back()->with(FlashMsg::item_new('You have converted project to milestone successfully'));
        }

        $number_of_milestone = $request->number_of_milestone;

        $clients = User::where('user_type' , 1)->latest()->get();
        $sellers = User::where('user_type' , 0)->where('user_status', 1)->get();
        return (string) view('backend.pages.ajax.milestone_project.add_project', compact('clients', 'sellers', 'number_of_milestone'));
    }

    public function edit_project(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $request->validate(
                [
                'name' => 'required|max:191|unique:projects,name,'.$id,
                'slug'=> 'max:191|unique:projects,slug,'.$id,
            ],
            [
                'name.unique' => __('Project Already Exists.'),
                'slug.unique' => __('Slug Already Exists.'),
            ]
            );
            
            $old_slug = Project::select('slug')->where('id',$id)->first();
            Project::where('id',$id)->update([
                'name' => $request->name,
                'client_id' => $request->client_id,
                'project_manager_id' => $request->project_manager_id,
                'timeline' => $request->timeline,
                'payment_details' => $request->payment_details,
                'slug'=>$request->slug ?? $old_slug->slug,
            ]);
            return redirect()->back()->with(FlashMsg::item_new('Project Update Success'));
        }
        $project = Project::find($id);
        $clients = User::where('user_type' , 1)->latest()->get();
        $project_managers = Admin::where('role' , 4)->latest()->get();
        return view('backend.pages.project.edit_project',compact('project', 'clients', 'project_managers'));
    }

    public function change_status($id){
       $project = Project::select('status')->where('id',$id)->first();
       if($project->status==1){
           $status = 0;
       }else{
        $status = 1;
       }
       Project::where('id',$id)->update(['status'=>$status]);
       return redirect()->back()->with(FlashMsg::item_new(' Status Change Success'));
    }

    public function delete_project($id){
        Project::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_new(' Project Deleted Success'));
    }

    public function bulk_action(Request $request){
        Project::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
