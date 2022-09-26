<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Requirement;
use App\ProjectDetails;
use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\Project;
use App\Payment;
use Str;
use Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project-list|project-create|project-status|project-edit|project-delete',['only' => ['index']]);
        $this->middleware('permission:project-create',['only' => ['add_new_project']]);
        $this->middleware('permission:project-edit',['only' => ['edit_project']]);
        $this->middleware('permission:project-status',['only' => ['change_status']]);
        $this->middleware('permission:project-delete',['only' => ['delete_project','bulk_action']]);
    }
    
    public function index(){
        $projects = Project::all();
        return view('backend.pages.project.index',compact('projects'));
    }

    public function add_new_project(Request $request)
    {
        if($request->isMethod('post')){
            $model = new Project();
            $requirement = Requirement::where('id', $request->requirement_id)->first();
            
            if($request->convert_type=='single-project'){
                $request->validate([
                    'name'=> 'required|unique:project_details|max:191',
                    'timeframe' => 'required',
                    'total_cost' => 'required',
                    'service_provider_id' => 'required',
                    'service_provider_cost' => 'required',
                    'attachment' => 'required',
                ]);

                $attachement = '';
                if($file = $request->file('attachment')){
                    $attachement = date('d-m-Y-His').'.'.$file->extension();
                    $file->move(public_path('/assets/backend/project-attachments'), $attachement);
                    $attachement = $attachement;
                }

                $model->requirement_id = $request->requirement_id;
                $model->client_id = $requirement->client_id;
                $model->service_provider_id = $request->service_provider_id;
                $model->convert_type = $request->convert_type;
                $model->total_cost = $request->total_cost;
                $model->service_provider_cost = $request->service_provider_cost;
                $model->save();

                if($model){
                    $project_details = ProjectDetails::create([
                        'project_id' => $model->id,
                        'name' => $request->name,
                        'slug' => str::slug($request->name),
                        'total_cost' => $request->total_cost,
                        'timeframe' => $request->timeframe,
                        'service_provider_cost' => $request->service_provider_cost,
                        'description' => $request->description,
                        'attachment' => $attachement,
                        'status' => $request->status,
                    ]);
                }     
                
            }else{
                foreach($request->milestone_names as $key=>$item){
                    if($key==0){
                        $model->requirement_id = $request->requirement_id;
                        $model->client_id = $requirement->client_id;
                        $model->service_provider_id = $request->milestone_service_providers[$key];
                        $model->convert_type = $request->convert_type;
                        $model->total_cost = $request->milestone_costs[$key];
                        $model->service_provider_cost = $request->milestone_service_provider_costs[$key];
                        $model->save();
                    }

                    $attachment = '';
                    if($files = $request->file('milestone_attachments')){
                        $attachement = date('d-m-Y-His').'.'.$files[$key]->extension();
                        $files[$key]->move(public_path('/assets/backend/milestone-attachments'), $attachement);
                        $attachment = $attachement;
                    }

                    if($model){
                        $project_details = ProjectDetails::create([
                            'project_id' => $model->id,
                            'name' => $request->milestone_names[$key],
                            'slug' => str::slug($request->milestone_names[$key]),
                            'total_cost' => $request->milestone_costs[$key],
                            'timeframe' =>$request->milestone_timeframes[$key],
                            'service_provider_cost' =>  $request->milestone_service_provider_costs[$key],
                            'description' => $request->milestone_descriptions[$key],
                            'status' => $request->milestone_statuses[$key],
                            'attachment' => $attachment,
                        ]);
                    }   
                }
            }

            if($project_details){
                $requirement->requirement_name = $request->requirement_name;
                $requirement->contact_mobile = $request->contact_mobile;
                $requirement->contact_email = $request->contact_email;
                $requirement->details = $request->details;
                $requirement->notes = $request->notes;
                $requirement->budget = $request->budget;
                $requirement->priority = $request->priority;
                $requirement->status = 1;
                $requirement->save();
            }

            return redirect()->back()->with(FlashMsg::item_new('You have converted project successfully'));
        }
    }

    public function ajaxNew(Request $request)
    {
        if(isset($request->number_of_milestone)){
            $number_of_milestone = $request->number_of_milestone;
            $sellers = User::where('user_type' , 0)->where('user_status', 1)->get();
            return (string) view('backend.pages.ajax.project.mileston_project_form', compact('sellers', 'number_of_milestone'));
        }else{
            $convert_type = $request->convert_type;
            $requirement = Requirement::where('id', $request->requirement_id)->first();
            $sellers = User::where('user_type' , 0)->where('user_status', 1)->get();    
            return (string) view('backend.pages.ajax.project.add_project', compact('sellers', 'convert_type', 'requirement'));
        }
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

    public function clientProjects(Request $request)
    {
        if(Auth::user()->user_type==0){ //0==seller
            $client = User::where('id', $request->client_id)->first();
            if($request->status==''){
                $client_projects = Project::where('client_id', $request->client_id)->where('service_provider_id', Auth::user()->id)->get();
            }else{
                $client_projects = Project::where('client_id', $request->client_id)->where('service_provider_id', Auth::user()->id)->where('status',  2)->orWhere('status', 3)->get();
            }
            return (string) view('frontend.user.seller.activity.client-projects', compact('client_projects', 'client'));
        }elseif(Auth::user()->user_type==1){ //client
            if($request->status==''){
                $projects = Project::where('client_id', $request->client_id)->get();
            }else{
                $projects = Project::where('client_id', Auth::user()->id)->where('status',  2)->orWhere('status', 3)->get();
            }
            return (string) view('frontend.user.buyer.activity.client-projects', compact('projects'));
        }else{
            $projects = Project::where('client_id', $request->client_id)->get();
            return (string) view('frontend.user.buyer.activity.client-projects', compact('projects'));
        }
    }

    public function projectStatus(Request $request)
    {
        Project::where('id', $request->project_id)->update([
            'status' => $request->status,
            'description' => '<strong>Seller: </strong>'.$request->description
        ]);

        $payment = Payment::orderby('id', 'desc')->where('project_id', $request->project_id)->first();
        ProjectDetails::where('id', $payment->project_details_id)->update([
            'status' => $request->status,
        ]);
        
        $client_projects = Project::where('client_id', $request->client_id)->where('service_provider_id', Auth::user()->id)->get();
        $client = User::where('id', $request->client_id)->first();
        return (string) view('frontend.user.seller.activity.client-projects', compact('client_projects', 'client'));
    }
    public function goToPayment(Request $request)
    {
        $project_details = ProjectDetails::where('id', $request->payment_project_details_id)->first();
        $payment_gateway = $request->payment_gateway;

        if($request->payment_gateway=='paypal_gateway'){
            return view('frontend.user.buyer.activity.payment.paypal_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='razorpay_gateway'){
            return view('frontend.user.buyer.activity.payment.razorpay_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='stripe_gateway'){
            return view('frontend.user.buyer.activity.payment.stripe_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='paytm_gateway'){
            return view('frontend.user.buyer.activity.payment.paytm_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='paystack_gateway'){
            return view('frontend.user.buyer.activity.payment.paystack_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='mollie_gateway'){
            return view('frontend.user.buyer.activity.payment.paystack_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='flutterwave_gateway'){
            return view('frontend.user.buyer.activity.payment.flutterwave_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='midtrans_gateway'){
            return view('frontend.user.buyer.activity.payment.midtrans_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='payfast_gateway'){
            return view('frontend.user.buyer.activity.payment.payfast_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='cashfree_gateway'){
            return view('frontend.user.buyer.activity.payment.cashfree_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='instamojo_gateway'){
            return view('frontend.user.buyer.activity.payment.instamojo_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='marcadopago_gateway'){
            return view('frontend.user.buyer.activity.payment.marcadopago_gateway', compact('project_details', 'payment_gateway'));
        }else if($request->payment_gateway=='manual_payment_gateway'){
            return view('frontend.user.buyer.activity.payment.manual_payment_gateway', compact('project_details', 'payment_gateway'));
        }
    }
    public function payment(Request $request)
    {
        $payment = Payment::create([
            'project_id' => $request->project_id,
            'project_details_id' => $request->project_details_id,
            'amount' => $request->payable_amount,
            'payment_gateway' => $request->payment_gateway,
            'type' => isset($request->credit_debit_card)?'credit':null,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'card_number' => $request->card_number,
            'expiration_date' => $request->expiration_date,
            'security_code' => $request->security_code,
        ]);

        if($payment){
            $project = Project::where('id', $request->project_id)->first();
            return view('frontend.user.buyer.activity.current-project-details', compact('project'));
        }
    }
}
