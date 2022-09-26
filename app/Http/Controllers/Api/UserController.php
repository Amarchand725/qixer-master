<?php

namespace App\Http\Controllers\Api;

use App\Notifications\TicketNotificationSeller;
use App\Actions\Media\MediaHelper;
use App\Country;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Order;
use App\ServiceArea;
use App\ServiceCity;
use App\SupportTicket;
use App\SupportTicketMessage;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required',
        ]);
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->error([
                'message' => __('invalid Email'),
            ]);
        }
        $user = User::select('id', 'email', 'password','country_id','state')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->error([
                'message' => __('Invalid Email or Password')
            ]);
        } else {
            $token = $user->createToken(Str::slug(get_static_option('site_title', 'qixer')) . 'api_keys')->plainTextToken;
            return response()->success([
                'users' => $user,
                'token' => $token,
            ]);
        }
    }

    

    //social login
    public function socialLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->error([
                'message' => __('invalid Email'),
            ]);
        }
        $username = $request->isGoogle === 0 ?  'fb_'.Str::slug($request->displayName) : 'gl_'.Str::slug($request->displayName);
        $user = User::select('id', 'email', 'username')
            ->where('email', $request->email)
            ->Orwhere('username', $username)
            ->first();

        if (is_null($user)) {
            $user = User::create([
                    'name' => $request->displayName,
                    'email' => $request->email,
                    'username' => $username,
                    'password' => Hash::make(\Str::random(8)),
                    'user_type' => 1,
                    'terms_condition' => 1,
                    'google_id' => $request->isGoogle === 1 ? $request->id : null,
                    'facebook_id' => $request->isGoogle === 0 ? $request->id : null
            ]);
        } 
        
        $token = $user->createToken(Str::slug(get_static_option('site_title', 'qixer')) . 'api_keys')->plainTextToken;
        return response()->success([
            'users' => $user,
            'token' => $token,
        ]);
    }

    // get country api
    public function country()
    {

        $countries = Country::select('id', 'country')->get();
        if ($countries) {
            return response()->success([
                'countries' => $countries,
            ]);
        } else {
            return response()->error([
                'message' => __("No Country Found"),
            ]);
        }

    }

    // get city under country api
    public function serviceCity($id)
    {
        $service_cities = ServiceCity::select('id', 'service_city')
            ->where('country_id', $id)
            ->get();
        if ($service_cities->count() >= 1) {
            return response()->json([
                'service_cities' => $service_cities,
            ]);
        } else {
            return response()->error([
                'message' => __('No Cities Available On The Selected Country'),
            ]);
        }

    }

    // get area under city and country api
    public function serviceArea($country_id, $city_id)
    {
        $service_areas = ServiceArea::select('id', 'service_area')
            ->where('country_id', $country_id)
            ->where('service_city_id', $city_id)
            ->get();
            
        if ($service_areas->count() >= 1) {
            return response()->json([
                'service_areas' => $service_areas,
            ]);
        } else {
            return response()->error([
                'message' => __('No Areas Available On The Selected City'),
            ]);
        }
        

    }

    //register api
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users|max:191',
            'username' => 'required|unique:users|max:191',
            'phone' => 'required|unique:users|max:191',
            'password' => 'required|min:6|max:191',
            'service_city' => 'required',
            'service_area' => 'required',
            'country_id' => 'required',
            'terms_conditions' => 'required',
        ]);
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->error([
                'message' => __('invalid Email'),
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'service_city' => $request->service_city,
            'state' => $request->service_city,
            'service_area' => $request->service_area,
            'country_code' => $request->country_code,
            'country_id' => $request->country_id,
            'user_type' => 1,
            'terms_condition' => 1,
        ]);
        if (!is_null($user)) {
            $token = $user->createToken(Str::slug(get_static_option('site_title', 'qixer')) . 'api_keys')->plainTextToken;
            return response()->success([
                'users' => $user,
                'token' => $token,
            ]);
        } 
        return response()->error([
            'message' => __('Something Went Wrong'),
        ]);
    }

    // send otp
    public function sendOTPSuccess(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'email_verified' => 'required|integer',
        ]);
        
        if(!in_array($request->email_verified,[0,1])){
            return response()->error([
                'message' => __('email verify code must have to be 1 or 0'),
            ]);
        }
        
        $user = User::where('id', $request->user_id)->update([
            'email_verified' =>  $request->email_verified
        ]);
         
         if(is_null($user)){
            return response()->error([
                'message' => __('Something went wrong, plese try after sometime,'),
            ]);
         }
         
        return response()->success([
            'message' => __('Email Verify Success'),
        ]);
    }   
    
     public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $otp_code = sprintf("%d", random_int(1234, 9999));
        $user_email = User::where('email', $request->email)->first();

        if (!is_null($user_email)) {
            try {
                $message_body = __('Here is your otp code') . ' <span class="verify-code">' . $otp_code . '</span>';
                Mail::to($request->email)->send(new BasicMail([
                    'subject' => __('Your OTP Code'),
                    'message' => $message_body
                ]));
            } catch (\Exception $e) {
                return response()->error([
                    'message' => __($e->getMessage()),
                ]);
            }
            
            return response()->success([
                'email' => $request->email,
                'otp' => $otp_code,
            ]);
            
        } else {
            return response()->error([
                'message' => __('Email Does not Exists'),
            ]);
        }

    }

    //reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $user = User::select('email')->where('email', $email)->first();
        if (!is_null($user)) {
            User::where('email', $user->email)->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->success([
                'message' => 'success',
            ]);
        } else {
            return response()->error([
                'message' => __('Email Not Found'),
            ]);
        }
    }

    //logout
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->success([
            'message' => __('Logout Success'),
        ]);
    }

    //User Profile
    public function profile(){
        
        $user_id = auth('sanctum')->id();
        
        $user = User::with('country','city','area')
        ->select('id','name','email','phone','address','about','country_id','service_city','service_area','post_code','image','country_code')
        ->where('id',$user_id)->first();

        $pending_orders = Order::where('status',0)
            ->where('buyer_id',$user_id)
            ->count();
        $active_orders = Order::where('status',1)
            ->where('buyer_id',$user_id)
            ->count();
        $complete_orders = Order::where('status',2)
            ->where('buyer_id',$user_id)
            ->count();
        $total_orders = Order::where('buyer_id',$user_id)
            ->count();

        $profile_image =  get_attachment_image_by_id($user->image);

        return response()->success([
            'user_details' => $user,
            'pending_order' => $pending_orders,
            'active_order' => $active_orders,
            'complete_order' => $complete_orders,
            'total_order' => $total_orders,
            'profile_image' => $profile_image,
        ]);
    }

//    change password after login
    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6',
        ]);

        $user = User::select('id','password')->where('id', auth('sanctum')->user()->id)->first();
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->error([
                'message' => __('Current Password is Wrong'),
            ]);
        }
        User::where('id',auth('sanctum')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return response()->success([
            'current_password' => $request->current_password,
            'new_password' => $request->new_password,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth('sanctum')->user();
        $user_id = auth('sanctum')->user()->id;

        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|max:191|email|unique:users,email,'.$user_id,
            'phone' => 'required|max:191',
            'service_area' => 'required|max:191',
            'address' => 'required|max:191',
        ]);

        if($request->file('file')){
            MediaHelper::insert_media_image($request);
            $last_image_id = DB::getPdo()->lastInsertId();
        }
        $old_image = User::select('image')->where('id',$user_id)->first();
        $user_update = User::where('id',$user_id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $last_image_id ?? $old_image->image,
                'service_city' => $request->service_city ?? $user->service_city,
                'service_area' => $request->service_area ?? $user->service_area,
                'country_id' => $request->country_id ?? $user->country_id,
                'post_code' => $request->post_code,
                'country_code' => $request->country_code,
                'address' => $request->address,
                'about' => $request->about,
                'state' => $request->service_city,
            ]);

        if($user_update){
            return response()->success([
                'message' =>__('Profile Updated Success'),
            ]);
        }
    }

    public function myOrders($id=null)
    {
        $uesr_info = auth('sanctum')->user()->id;
        $my_orders = Order::where('buyer_id',$uesr_info)->get()->transform(function($item){
            $item->payment_status =  !empty($item->payment_status) ? $item->payment_status : 'pending';
            return $item;
        });
        return response()->success([
            'my_orders' => $my_orders,
            'user_id' => $uesr_info,
        ]);
    }

    public function allTickets()
    {
        $all_tickets = SupportTicket::select('id','title','description','subject','priority','status')
        ->where('buyer_id',auth('sanctum')->id())->orderBy('id','Desc')
        ->paginate(10)
        ->withQueryString();
        
        return response()->success([ 
            'buyer_id'=> auth('sanctum')->id(),
            'tickets' =>$all_tickets,
        ]);
    }

    public function viewTickets(Request $request,$id= null)
    {
        $all_messages = SupportTicketMessage::where(['support_ticket_id'=>$id])->get()->transform(function($item){
            $item->attachment = !empty($item->attachment) ? asset('assets/uploads/ticket/'.$item->attachment) : null;
            return $item;
        });
        $q = $request->q ?? '';
        return response()->success([
            'ticket_id'=>$id,
            'all_messages' =>$all_messages,
            'q' =>$q,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request,[
            'ticket_id' => 'required',
            'user_type' => 'required|string|max:191',
            'message' => 'required',
            'file' => 'nullable|mimes:jpg,png,jpeg,gif',
        ]);

        $ticket_info = SupportTicketMessage::create([
            'support_ticket_id' => $request->ticket_id,
            'type' => $request->user_type,
            'message' => $request->message,
        ]);
        
        if ($request->hasFile('file')){
            
            $uploaded_file = $request->file;
            $file_extension = $uploaded_file->extension();
            $file_name =  pathinfo($uploaded_file->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.$file_extension;
            $uploaded_file->move('assets/uploads/ticket',$file_name);
            $ticket_info->attachment = $file_name;
            $ticket_info->save();
        }

        return response()->success([
            'message'=>__('Message Send Success'),
            'ticket_id'=>$request->ticket_id,
            'user_type' =>$request->user_type,
            'ticket_info' => $ticket_info,
        ]);
    }
    
    public function createTicket(Request $request){
            $this->validate($request,[
                'subject' => 'required|string|max:191',
                'priority' => 'required|string|max:191',
                'description' => 'required|string',
                'order_id' => 'required|integer',
            ],[
                'subject.required' =>  __('subject required'),
                'priority.required' =>  __('priority required'),
                'description.required' => __('description required'),
            ]);
            
            $orderInfo = Order::select('seller_id','service_id')->where('id',$request->order_id)->first();
            if(is_null($orderInfo)){
                return response()->success([
                    'message'=>__('Order Not Found')
                ]);
            }
            $support = SupportTicket::create([
                'title' => sprintf(__('TIcket Created By %s'),auth('sanctum')->user()->name),
                'description' => $request->description,
                'subject' => $request->subject,
                'status' => 'open',
                'priority' => $request->priority,
                'buyer_id' => auth('sanctum')->user()->id,
                'seller_id' => $orderInfo->seller_id,
                'service_id' => $orderInfo->service_id,
                'order_id' => $orderInfo->id,
            ]);

            // send order ticket notification to seller
            $seller = User::where('id',$orderInfo->seller_id)->first();
            if($seller){
                $order_ticcket_message = __('You have a new order ticket');
                $seller ->notify(new TicketNotificationSeller($support->id , $support->seller_id, $support->seller_id,$order_ticcket_message ));
            }
            
            return response()->success([
                'message'=>__('Support Ticket Created Success'),
                'ticket_info' =>$support
            ]);
    }
    
    
    public function singleOrder(Request $request){
        if(empty($request->id)){
            return response()->error(['message' => __('no order found')]);
        }
        
        $orderInfo = Order::where('id',$request->id)->first();
        $orderInfo->payment_status = !empty($orderInfo->payment_status) ? $orderInfo->payment_status : 'pending';
        $orderInfo->total = amount_with_currency_symbol($orderInfo->total);
        $orderInfo->tax = amount_with_currency_symbol($orderInfo->tax);
        $orderInfo->sub_total = amount_with_currency_symbol($orderInfo->sub_total);
        $orderInfo->extra_service = amount_with_currency_symbol($orderInfo->extra_service);
        $orderInfo->package_fee = amount_with_currency_symbol($orderInfo->package_fee);
        
        if(is_null($orderInfo)){
            return response()->success([
                'message'=>__('Order Not Found')
            ]);
        }
        
        return response()->success([
                'orderInfo'=> $orderInfo
        ]);
    }

}
