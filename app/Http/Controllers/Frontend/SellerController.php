<?php

namespace App\Http\Controllers\Frontend;

use App\Accountdeactive;
use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Mail\OrderMail;
use App\Notifications\TicketNotification;
use App\OnlineServiceFaq;
use App\Report;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Serviceadditional;
use App\Serviceinclude;
use App\Servicebenifit;
use App\Subcategory;
use App\Category;
use App\Country;
use App\Service;
use App\ServiceCity;
use App\ServiceArea;
use App\User;
use App\Day;
use App\Order;
use App\OrderAdditional;
use App\OrderInclude;
use App\Review;
use App\Schedule;
use App\ServiceCoupon;
use App\SupportTicket;
use App\SupportTicketMessage;
use App\ToDoList;
use App\Events\SupportMessage;
use App\Helpers\FlashMsg;
use App\PayoutRequest;
use App\AmountSettings;
use App\SellerVerify;
use App\Requirement;
use App\Project;
use App\ProjectDetails;
use App\StaticOption;
use App\Chat;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use Str;
use DB;


class SellerController extends Controller
{
     public function __construct(){
        $this->middleware('inactiveuser');
    }

    public function sellerActivity()
    {
        if(Auth::user()->user_type==0){
            return view('frontend.user.seller.activity.activity');
        }elseif(Auth::user()->user_type==1){
            /* $payment_gateways = StaticOption::where('id', '>', 0)
            ->where('option_name', 'paypal_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'razorpay_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'stripe_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'paytm_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'paystack_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'mollie_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'flutterwave_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'midtrans_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'payfast_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'cashfree_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'instamojo_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'marcadopago_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'manual_payment_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'manual_payment_gateway')
            ->where('option_value', 'on')
            ->get(); */

            $payment_gateways = StaticOption::orderby('id', 'desc')
            ->where('option_name', 'razorpay_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'stripe_gateway')
            ->where('option_value', 'on')
            ->orWhere('option_name', 'paypal_gateway')
            ->where('option_value', 'on')
            ->get();

            $projects = Project::where('client_id', Auth::user()->id)->get();

            return view('frontend.user.buyer.activity.activity', compact('payment_gateways', 'projects'));
        }
    }
    
    public function getProjectDetails(Request $request)
    {
        $project = Project::where('id', $request->project_id)->first();
        if(Auth::user()->user_type==0){ //seller
            return view('frontend.user.seller.activity.current-project-details', compact('project'));
        }elseif(Auth::user()->user_type==1){ //buyer
            return view('frontend.user.buyer.activity.current-project-details', compact('project'));
        }
    }

    public function getProjectMoreDetails(Request $request)
    {
        $project = ProjectDetails::where('id', $request->project_id)->first();
        return view('frontend.user.seller.activity.project-more-details', compact('project'));
    }

    public function chat(Request $request)
    {
        $milestone = ProjectDetails::where('id', $request->milestone_id)->first();
        $project_manager_id = $milestone->hasProject->hasRequirement->project_manager_id;
        $client_id = $milestone->hasProject->hasRequirement->client_id;

        Chat::where('reciever_id', Auth::user()->id)
            ->where('project_details_id', $request->milestone_id)
            ->where('is_read', 0)
            ->update(['is_read'=>1]);
        
        $all_chat = Chat::orderby('id', 'asc')
                    /* ->where('sender_id', Auth::user()->id)
                    ->where('reciever_id', $project_manager_id)

                    ->orWhere('sender_id', $project_manager_id)
                    ->where('reciever_id', Auth::user()->id) */
                    ->where('project_details_id', $request->milestone_id)
                    ->groupby('session_id')
                    ->get();
        
        return (string) view('frontend.user.seller.activity.chat', compact('milestone', 'all_chat'));
    }

    public function timeline(Request $request)
    {
        $project = Project::where('id', $request->project_id)->first();
        if(Auth::user()->user_type==0){
            return view('frontend.user.seller.activity.timeline', compact('project'));
        }elseif(Auth::user()->user_type==1){
            return view('frontend.user.buyer.activity.timeline', compact('project'));
        }
    }

    public function sellerDashboard()
    {
        $total_earnings = 0;
        $seller_id = Auth::guard('web')->user()->id;
        $pending_order = Order::where(['status'=>0,'seller_id'=>$seller_id])->count();
        $complete_order = Order::where(['status'=>2,'seller_id'=>$seller_id])->count();
        
        //balance calculate
        $get_sum = Order::where(['status'=>2,'seller_id'=>$seller_id]);

        $complete_order_balance_with_tax = $get_sum->sum('total');
        $complete_order_tax = $get_sum->sum('tax');
        $complete_order_balance_without_tax = $complete_order_balance_with_tax - $complete_order_tax;
        $admin_commission_amount = $get_sum->sum('commission_amount');
        $remaning_balance = $complete_order_balance_without_tax-$admin_commission_amount;
       
        $this_month = Order::where(['seller_id'=>$seller_id,'status'=>2])->whereMonth('created_at', Carbon::now()->month);
         //earning or withdraw calculate
        $total_earnings = PayoutRequest::where('seller_id',$seller_id)->sum('amount');
        $last_five_order = Order::where('seller_id',$seller_id)->latest()->take(5)->get();
        $this_month_order_count = $this_month->count();

        //this month balance calculate        
        $this_month_total_balance_with_tax = $this_month->sum('total');
        $this_month_total_tax = $this_month->sum('tax');
        $this_month_admin_commission = $this_month->sum('commission_amount');
        $this_month_balance_without_tax_and_admin_commission = $this_month_total_balance_with_tax - ($this_month_total_tax+$this_month_admin_commission);
        //this month earning or withdraw calculate
        $this_month_earnings = PayoutRequest::where('seller_id',$seller_id)->whereMonth('created_at', Carbon::now()->month)->sum('amount');

        //to do list 
        $to_do_list = ToDoList::where(['user_id' => $seller_id,'status' => 0])->take(3)->latest()->get();
        $to_do_list_all = ToDoList::where('user_id',$seller_id)->latest()->get();

        $buyer_count = Order::where('seller_id',$seller_id)->distinct('buyer_id')->count();

       
        //get last 12 months order
        $month_list = [];
        $monthly_order_list = [];

        for($i=11; $i>=0;$i--){
            $month_list[] = Carbon::now()->subMonth($i)->format('M');
            $monthly_order_list[] = Order::where('seller_id',$seller_id)->whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()
            ->subMonth($i))
            ->count();
        }

        //get last 7 days order
        $currentDateTime = Carbon::now();
        $days_list = [];
        $pending_order_list = [];
        $active_order_list = [];
        $complete_order_list = [];
        
        for ($i=6; $i >= 0; $i--) { 
            $days_list[] = Carbon::parse($currentDateTime)->subDay($i)->dayName;
            $pending_order_list[] = Order::where('seller_id',$seller_id)->where('status',0)
            ->whereDay('created_at',Carbon::now()
            ->subDay($i))
            ->count();
            $active_order_list[] = Order::where('seller_id',$seller_id)->where('status',1)
            ->whereDay('created_at',Carbon::now()
            ->subDay($i))
            ->count();
            $complete_order_list[] = Order::where('seller_id',$seller_id)->where('status',2)
            ->whereDay('created_at',Carbon::now()
            ->subDay($i))
            ->count();
        }

        return view('frontend.user.seller.dashboard.dashboard',compact(
            'pending_order','complete_order','remaning_balance','total_earnings','last_five_order',
            'this_month_order_count','this_month_balance_without_tax_and_admin_commission','this_month_earnings','buyer_count','to_do_list','to_do_list_all',
             'month_list',
             'monthly_order_list',
             'days_list',
             'pending_order_list',
             'active_order_list',
             'complete_order_list'
        ));
    }

    public function sellerProfile()
    {
        return view('frontend.user.seller.profile.seller-profile');
    }

    public function sellerProfileEdit(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = Auth::guard('web')->user()->id;
            $request->validate([
                'name' => 'required|max:191',
                'email' => 'required|max:191|email|unique:users,email,'.$user,
                'phone' => 'required|max:191',
                'service_area' => 'required|max:191',
                'post_code' => 'required|max:191',
                'address' => 'required|max:191',
                'about' => 'required|max:5000',
            ]);
            $old_image = User::select('image','profile_background')->where('id',Auth::guard('web')->user()->id)->first();
            User::where('id', Auth::guard('web')->user()->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'image' => $request->image ?? $old_image->image,
                    'profile_background' => $request->profile_background ?? $old_image->profile_background,
                    'service_city' => $request->service_city,
                    'service_area' => $request->service_area,
                    'country_id' => $request->country,
                    'post_code' => $request->post_code,
                    'address' => $request->address,
                    'about' => $request->about,
                    'fb_url' => $request->fb_url, 
                    'tw_url' => $request->tw_url, 
                    'go_url' => $request->go_url,
                    'yo_url' => $request->yo_url,
                    'li_url' => $request->li_url,
                    'in_url' => $request->in_url,
                    'pi_url' => $request->pi_url,
                    'dr_url' => $request->dr_url,
                    'twi_url' => $request->twi_url,
                    're_url' => $request->re_url,
                ]);
            toastr_success(__('Profile Update Success---'));
            
            $user_info = Auth::guard('web')->user();
            if($user_info->user_type === 0 ){
                Service::where('seller_id',$user_info->id)->update(['service_city_id' =>  $request->service_city]);
            }
            
            return redirect()->back();
        }
        
        $cities = ServiceCity::where('status',1)->get();
        $areas = ServiceArea::where('status',1)->get();
        $countries = Country::where('status',1)->get();
        return view('frontend.user.seller.profile.seller-profile-edit',compact('cities','areas','countries'));
    }

    public function sellerAccountSetting(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'current_password' => 'required|min:6',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|min:6',
            ]);

            $seller = User::where('id', Auth::user()->id)->first();

            if (Hash::check($request->current_password, $seller->password)) {
                if ($request->new_password == $request->confirm_password) {
                    User::where('id', $seller->id)->update(['password' => Hash::make($request->new_password)]);
                    toastr_success(__('Password Update Success---'));
                    return redirect()->back();
                }
                toastr_error(__('Password and Confirm Password not match---'));
                return redirect()->back();
            }
            toastr_error(__('Current Password is Wrong---'));
            return redirect()->back();
        }
        $user = Accountdeactive::select('user_id')->where('user_id', Auth::guard('web')->user()->id)->first();
        return view('frontend.user.seller.profile.seller-account-settings', compact('user'));
    }

    public function accountDeactive(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'reason' => 'required',
                'description' => 'required|max:150',
            ]);
            Accountdeactive::create([
                'user_id' => Auth::guard('web')->user()->id,
                'reason' => $request['reason'],
                'description' => $request['description'],
                'status' => 0,
                'account_status' => 0,
            ]);
            
            Service::where('seller_id',Auth::guard('web')->user()->id)
            ->update(['status'=>0]);

            toastr_error(__('Your Account Successfully Deactive'));
            return redirect()->back();
        }
    }

    public function accountDeactiveCancel($id = null)
    {
        $account_details = Accountdeactive::where('user_id', $id)->first();
        $account_details->delete();
        Service::where('seller_id',Auth::guard('web')->user()->id)
            ->update(['status'=>1]);
        toastr_success(__('Your Account Successfully Active'));
        return redirect()->back();
    }

    public function sellerLogout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    //coupons 
    public function serviceCoupon()
    {
        $coupons = ServiceCoupon::where('seller_id',Auth::guard('web')->user()->id)->get();
        return view('frontend.user.seller.coupons.coupons',compact('coupons'));
    }

    public function addServiceCoupon(Request $request)
    {

      $request->validate([
            'code' => 'required|max:191',
            'discount' => 'required|numeric',
            'discount_type' => 'required|max:191',
            'expire_date' => 'required',
        ]);

        ServiceCoupon::create([
            'code' => str_replace(' ', '', $request->code),
            'discount' => $request->discount,
            'discount_type' => $request->discount_type,
            'expire_date' => $request->expire_date,
            'status' => 0,
            'seller_id' => Auth::guard('web')->user()->id,
            
        ]);

        toastr_success(__('Coupon Added Success---'));
        return redirect()->back();
    }

    public function updateServiceCoupon(Request $request)
    {
        $request->validate([
            'up_code' => 'required|max:191',
            'up_discount' => 'required|numeric',
            'up_discount_type' => 'required|max:191',
            'up_expire_date' => 'required',
        ]);

        ServiceCoupon::where('id',$request->up_id)->update([
            'code' => str_replace(' ', '', $request->up_code),
            'discount' => $request->up_discount,
            'discount_type' => $request->up_discount_type,
            'expire_date' => $request->up_expire_date,
            'seller_id' => Auth::guard('web')->user()->id,
        ]);

        toastr_success(__('Coupon Update Success---'));
        return redirect()->back();
    }

    public function changeCouponStatus($id=null)
    {
        $status = ServiceCoupon::select('status')->where('id', $id)->first();
        if ($status->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        ServiceCoupon::where('id',$id)->update([
            'status' => $status,
        ]);
        toastr_success(__('Coupon status Update Success---'));
        return redirect()->back();
    }

    public function couponDelete($id = null)
    {   
        ServiceCoupon::find($id)->delete();
        toastr_error(__('Coupon Delete Success---'));
        return redirect()->back();
    }

    //services
    public function sellerServices()
    {
        $services = Service::with('reviews','pendingOrder','completeOrder','cancelOrder')
        ->where('seller_id', Auth::user()->id)
        ->latest()->paginate(10);
        return view('frontend.user.seller.services.services', compact('services'));
    }

    public function addServices(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'category' => 'required',
                'title' => 'required|max:191|unique:services',
                'description' => 'required|min:150',
                'slug' => 'required',
            ]);
            
            
            $service = new Service();
            $service->category_id = $request->category;
            $service->subcategory_id = $request->subcategory;
            $service->title = $request->title;
            $service->slug = $request->slug;
            $service->description = $request->description;
            $service->image = $request->image;
            $service->image_gallery = $request->image_gallery;
            $service->video = $request->video;
            $service->seller_id = Auth::guard('web')->user()->id;
            $service->service_city_id = Auth::guard('web')->user()->service_city;
            $service->status = 0;
            $service->tax = $request->tax;

            $Metas = [
                'meta_title'=> purify_html($request->meta_title),
                'meta_tags'=> purify_html($request->meta_tags),
                'meta_description'=> purify_html($request->meta_description),
    
                'facebook_meta_tags'=> purify_html($request->facebook_meta_tags),
                'facebook_meta_description'=> purify_html($request->facebook_meta_description),
                'facebook_meta_image'=> $request->facebook_meta_image,
    
                'twitter_meta_tags'=> purify_html($request->twitter_meta_tags),
                'twitter_meta_description'=> purify_html($request->twitter_meta_description),
                'twitter_meta_image'=> $request->twitter_meta_image,
            ];
            $service->save();
            $last_service_id = DB::getPdo()->lastInsertId();
            $service->metaData()->create($Metas);
        

            try {
                $message_body = __('Hello admin new service is just created. Please check for approve, thanks').'</br>'.'<span class="verify-code">'.__('Service ID: ').$last_service_id.'</span>';
                Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                    'subject' => __('New Service Approve Request'),
                    'message' => $message_body
                ]));
            } catch (\Exception $e) {
                //return redirect()->back()->with(FlashMsg::item_new($e->getMessage()));
            }

            toastr_success(__('Service Added Success---'));
            return redirect('/seller/service-attributes');
        }

        $categories = Category::where('status', 1)->get();
        $sub_categories = Subcategory::all();
        return view('frontend.user.seller.services.add-service', compact('categories', 'sub_categories'));
    }

    public function getSubcategory(Request $request)
    {
        $sub_categories = Subcategory::where('category_id', $request->category_id)->where('status', 1)->get();
        return response()->json([
            'status' => 'success',
            'sub_categories' => $sub_categories,
        ]);
    }

    public function serviceAttributes(Request $request)
    {
        $latest_service = Service::where('seller_id', Auth::guard('web')->id())->latest()->first();
        return view('frontend.user.seller.services.service-attributes', compact('latest_service'));
    }

    public function addServiceAttributes(Request $request)
    {
        $data = $request->all();
        if(isset($data['is_service_online_id'])){
            if($data['is_service_online_id'] == 1){
                $request->validate(
                    [
                    'include_service_title.*' => 'required|max:191',
                    'online_service_price' => 'required|integer',
                    'delivery_days' => 'required|integer',
                    'revision' => 'required|integer',
                    ],
                    [
                        'include_service_title.*.required' => __('Title is required'),
                    ]
                );
            }
        }else{
            $request->validate(
                [
                'include_service_title.*' => 'required',
                'include_service_price.*' => 'required|numeric',
                'include_service_quantity.*' => 'required|numeric'
                ],
                [
                    'include_service_title.*.required' => __('Title is required'),
                    'include_service_price.*.required' => __('Price is required'),
                    'include_service_price.*.numeric' => __('Price must be a number'),
                    'include_service_quantity.*.required' => __('Quantity is required'),
                    'include_service_quantity.*.numeric' => __('Quantity must be a number'),
                ]
            );
        }

        $all_include_service = [];
        $all_additional_service = [];
        $all_benifits_service = [];
        $online_service_faqs = [];
        $service_total_price = 0;

        if(isset($data['is_service_online_id'])){
            Service::where('id', $request->service_id)->update([
                'price' => $data['online_service_price'],
                'delivery_days' => $data['delivery_days'],
                'revision' => $data['revision'],
                'is_service_online' => 1,
            ]);

            if($data['is_service_online_id'] == 1){
                if(isset($data['include_service_title'])) {
                    foreach ($data['include_service_title'] as $key => $value) {
                        $all_include_service[] = [
                            'service_id' => $request->service_id,
                            'seller_id' => Auth::guard('web')->user()->id,
                            'include_service_title' => $data['include_service_title'][$key],
                            'include_service_price' => 0,
                            'include_service_quantity' => 0,
                        ];
                    }
                }
                Serviceinclude::insert($all_include_service);
            }
        }else{
            if(isset($data['include_service_title'])) {
                foreach ($data['include_service_title'] as $key => $value) {
                    $all_include_service[] = [
                        'service_id' => $request->service_id,
                        'seller_id' => Auth::guard('web')->user()->id,
                        'include_service_title' => $data['include_service_title'][$key],
                        'include_service_price' => $data['include_service_price'][$key],
                        'include_service_quantity' => $data['include_service_quantity'][$key],
                    ];
                    $service_total_price += $data['include_service_price'][$key] * $data['include_service_quantity'][$key];
                }
            }
            Serviceinclude::insert($all_include_service);
            Service::where('id', $request->service_id)->update(['price' => $service_total_price]);
        }

            if(isset($data['additional_service_title'])){
                foreach ($data['additional_service_title'] as $key => $value) {
                    if(!empty($data['additional_service_title'][$key])){
                        $all_additional_service[] = [
                            'service_id' => $request->service_id,
                            'seller_id' => Auth::guard('web')->user()->id,
                            'additional_service_title' => $data['additional_service_title'][$key],
                            'additional_service_price' => $data['additional_service_price'][$key],
                            'additional_service_quantity' => $data['additional_service_quantity'][$key],
                            'additional_service_image' => $data['image'][$key],
                        ];
                    }
                }
            }
            Serviceadditional::insert($all_additional_service);

            if(isset($data['benifits'])){
                foreach ($data['benifits'] as $key => $value) {
                        $all_benifits_service[] = [
                            'service_id' => $request->service_id,
                            'seller_id' => Auth::guard('web')->user()->id,
                            'benifits' => $data['benifits'][$key],
                        ];
                }
            }
            Servicebenifit::insert($all_benifits_service);

        if(isset($data['faqs_title'])){
            foreach ($data['faqs_title'] as $key => $value) {
                $online_service_faqs[] = [
                    'service_id' => $request->service_id,
                    'seller_id' => Auth::guard('web')->user()->id,
                    'title' => $data['faqs_title'][$key],
                    'description' => $data['faqs_description'][$key],
                ];
            }
        }
        OnlineServiceFaq::insert($online_service_faqs);
        

        toastr_success(__('Service attributes added success---'));
        return redirect()->route('seller.services');
    }

    public function addServiceAttributesById(Request $request,$id=null)
    {
        $get_service = Service::where('id',$id)->where('seller_id',Auth::guard('web')->user()->id)->first();
        if($request->isMethod('post')) {
            $data = $request->all();

            $all_include_service = [];
            $all_additional_service = [];
            $all_benifits_service = [];
            $online_service_faqs = [];
            $service_total_price = 0;
            $service_total_price_with_new_added_attribute = 0;
            $service_count = 0;

            if(isset($data['is_service_online_id'])){
                if($data['is_service_online_id'] == 1){
                    if(isset($data['include_service_title'])){
                        foreach ($data['include_service_title'] as $key => $value) {
                            if (!empty($data['include_service_title'][$key])) {
                                $all_include_service[] = [
                                    'service_id' => $request->service_id,
                                    'seller_id' => Auth::guard('web')->user()->id,
                                    'include_service_title' => $data['include_service_title'][$key],
                                    'include_service_price' => 0,
                                    'include_service_quantity' => 0,
                                ];
                                $service_count++;
                            }
                        }
                    }
                }
            }else{
                if(isset($data['include_service_title'])){
                    foreach ($data['include_service_title'] as $key => $value) {
                        if (!empty($data['include_service_title'][$key])) {
                            $all_include_service[] = [
                                'service_id' => $request->service_id,
                                'seller_id' => Auth::guard('web')->user()->id,
                                'include_service_title' => $data['include_service_title'][$key],
                                'include_service_price' => $data['include_service_price'][$key],
                                'include_service_quantity' => $data['include_service_quantity'][$key],
                            ];
                            $service_total_price += $data['include_service_price'][$key] * $data['include_service_quantity'][$key];
                            $service_count++;
                        }
                    }
                }
            }

                if($service_count>=1){
                    Serviceinclude::insert($all_include_service);
                    $service_old_price = Service::where('id',$id)->select('price')->first();
                    $service_total_price_with_new_added_attribute =($service_old_price->price + $service_total_price);
                    Service::where('id', $request->service_id)->update(['price' => $service_total_price_with_new_added_attribute]);
                }

            if(isset($data['additional_service_title'])) {
                foreach ($data['additional_service_title'] as $key => $value) {
                    if (!empty($data['additional_service_title'][$key])) {
                        $all_additional_service[] = [
                            'service_id' => $request->service_id,
                            'seller_id' => Auth::guard('web')->user()->id,
                            'additional_service_title' => $data['additional_service_title'][$key],
                            'additional_service_price' => $data['additional_service_price'][$key],
                            'additional_service_quantity' => $data['additional_service_quantity'][$key],
                            'additional_service_image' => $data['image'][$key],
                        ];
                        $service_count++;
                    }
                }
            }

                if($service_count>=1){
                    Serviceadditional::insert($all_additional_service);
                }

            if(isset($data['benifits'])) {
                foreach ($data['benifits'] as $key => $value) {
                    if (!empty($data['benifits'][$key])) {
                        $all_benifits_service[] = [
                            'service_id' => $request->service_id,
                            'seller_id' => Auth::guard('web')->user()->id,
                            'benifits' => $data['benifits'][$key],
                        ];
                        $service_count++;
                    }
                }
            }

            if($service_count>=1){
                Servicebenifit::insert($all_benifits_service);
            }

            if(isset($data['faqs_title'])){
                foreach ($data['faqs_title'] as $key => $value) {
                    if (!empty($data['benifits'][$key])) {
                        $online_service_faqs[] = [
                            'service_id' => $request->service_id,
                            'seller_id' => Auth::guard('web')->user()->id,
                            'title' => $data['faqs_title'][$key],
                            'description' => $data['faqs_description'][$key],
                        ];
                        $service_count++;
                    }
                }
            }
            if($service_count>=1){
                OnlineServiceFaq::insert($online_service_faqs);
            }

            if($service_count <= 0){
                toastr_error(__('Please input service attributes---'));
                return redirect()->back();
            }
                
            toastr_success(__('Service attributes added success---'));
            return redirect()->route('seller.services');
        }
        if($get_service !=''){
            return view('frontend.user.seller.services.add-service-attributes-by-id', compact('get_service'));     
        }else{
            abort(404);
        }
        
    }

    public function ServiceOnOf(Request $request)
    {
        $is_service_on = Service::select('is_service_on')->where('id', $request->service_id)->first();
        if ($is_service_on->is_service_on == 1) {
            $is_service_on = 0;
            Service::where('id', $request->service_id)->update(['is_service_on' => $is_service_on]);
        } else {
            $is_service_on = 1;
            Service::where('id', $request->service_id)->update(['is_service_on' => $is_service_on]);
        }
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function editServices(Request $request, $id = null)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'category' => 'required',
                'title' => 'required|max:191|unique:services,id,'.$id,
                'description' => 'required|min:150',
            ]);

             $old_image = Service::select('image','image_gallery')->where('id',$id)->first();
             $old_slug = Service::select('slug')->where('id',$id)->first();

            Service::where('id', $id)->update([
                'category_id' => $request->category,
                'subcategory_id' => $request->subcategory,
                'title' => $request->title,
                'slug' => $request->slug ?? $old_slug->slug,
                'description' => $request->description,
                'image' => $request->image ?? $old_image->image,
                'image_gallery' => $request->image_gallery ?? $old_image->image_gallery,
                'video' => $request->video,
                'tax' => $request->tax,
            ]);
            
            $service_meta_update =  Service::findOrFail($id);
            $Metas = [
                'meta_title'=> purify_html($request->meta_title),
                'meta_tags'=> $request->meta_tags,
                'meta_description'=> purify_html($request->meta_description),
    
                'facebook_meta_tags'=> purify_html($request->facebook_meta_tags),
                'facebook_meta_description'=> purify_html($request->facebook_meta_description),
                'facebook_meta_image'=> $request->facebook_meta_image,
    
                'twitter_meta_tags'=> purify_html($request->twitter_meta_tags),
                'twitter_meta_description'=> purify_html($request->twitter_meta_description),
                'twitter_meta_image'=> $request->twitter_meta_image,
            ];
    
            DB::beginTransaction();
    
            try {
                $service_meta_update->metaData()->update($Metas);
                DB::commit();
    
            }catch (\Throwable $th){
                DB::rollBack();
            }

            toastr_success(__('Service updated success---'));
            return redirect()->route('seller.services');
        }

        $categories = Category::where('status', 1)->get();
        $sub_categories = Subcategory::all();
        $service = Service::with('subcategory')->find($id);
        if($service != ''){
            return view('frontend.user.seller.services.edit-service', compact('categories', 'sub_categories', 'service'));
        }else{
            abort(404);
        }
        
    }

    public function editServiceAttribute(Request $request, $id = null)
    {
        // update
        if ($request->isMethod('post')) {
            $data = $request->all();
            if(isset($data['is_service_online_id'])){
                if($data['is_service_online_id'] == 1){
                    $request->validate([
                        'include_service_title.*' => 'required|max:191',
                        'online_service_price' => 'required|integer',
                        'delivery_days' => 'required|integer',
                        'revision' => 'required|integer',
                    ],
                        [
                            'include_service_title.*.required' => __('Title is required'),
                        ]);
                }
            }else{
                $request->validate(
                    [
                        'include_service_title.*' => 'required',
                        'include_service_price.*' => 'required|numeric',
                        'include_service_quantity.*' => 'required|numeric'
                    ],
                    [
                        'include_service_title.*.required' => __('Title is required'),
                        'include_service_price.*.required' => __('Price is required'),
                        'include_service_price.*.numeric' => __('Price must be a number'),
                        'include_service_quantity.*.required' => __('Quantity is required'),
                        'include_service_quantity.*.numeric' => __('Quantity must be a number'),
                    ]
                );
            }

            $all_include_service = [];
            $all_additional_service = [];
            $all_benifits_service = [];
            $service_total_price = 0;
            
            $x = [
                'include' => [],
            ];

            if(isset($data['is_service_online_id'])){
                if($data['is_service_online_id'] == 1){
                    Service::where('id', $id)->update([
                        'price' => $data['online_service_price'],
                        'delivery_days' => $data['delivery_days'],
                        'revision' => $data['revision'],
                    ]);
                    if(isset($data['include_service_title'])) {
                        foreach ($data['include_service_title'] as $key => $value) {
                            Serviceinclude::where('id', $data['service_include_id'][$key])->update([
                                'include_service_title' => $data['include_service_title'][$key],
                                'include_service_price' => 0,
                                'include_service_quantity' => 0,
                            ]);
                        }
                    }
                }
            }else{
                if (isset($data['include_service_title'])) {
                    foreach ($data['include_service_title'] as $key => $value) {
                        Serviceinclude::where('id', $data['service_include_id'][$key])->update([
                            'include_service_title' => $data['include_service_title'][$key],
                            'include_service_price' => $data['include_service_price'][$key],
                            'include_service_quantity' => $data['include_service_quantity'][$key],
                        ]);
                        $service_total_price += $data['include_service_price'][$key] * $data['include_service_quantity'][$key];
                    }
                    Service::where('id', $id)->update(['price' => $service_total_price]);
                }
            }

            if (isset($data['additional_service_title'])) {
                foreach ($data['additional_service_title'] as $key => $value) {
                    $old_image = Serviceadditional::select('additional_service_image')->where('id', $data['service_additional_id'][$key])->first();

                    Serviceadditional::where('id', $data['service_additional_id'][$key])->update([
                        'additional_service_title' => $data['additional_service_title'][$key],
                        'additional_service_price' => $data['additional_service_price'][$key],
                        'additional_service_quantity' => $data['additional_service_quantity'][$key],
                        'additional_service_image' => $data['image'][$key],
                        'additional_service_image' => $data['image'][$key] ?? $old_image->additional_service_image,
                    ]);
                }
            }

            if (isset($data['benifits'])) {
                foreach ($data['benifits'] as $key => $value) {
                    Servicebenifit::where('id', $data['service_benifit_id'][$key])->update([
                        'benifits' => $data['benifits'][$key],
                    ]);
                }
            }

            if (isset($data['faqs_title'])) {
                foreach ($data['faqs_title'] as $key => $value) {
                    OnlineServiceFaq::where('id', $data['online_service_faq_id'][$key])->update([
                        'title' => $data['faqs_title'][$key],
                        'description' => $data['faqs_description'][$key],
                    ]);
                }
            }

            toastr_success(__('Service Attributes Updated Success---'));
            return redirect()->route('seller.services');
        }

        $service = Service::find($id);
        if($service !=''){
            $service_includes = ServiceInclude::where('service_id', $id)->get();
            $service_additionals = ServiceAdditional::where('service_id', $id)->get();
            $service_benifits = ServiceBenifit::where('service_id', $id)->get();
            $online_service_faq = OnlineServiceFaq::where('service_id', $id)->get();
            return view('frontend.user.seller.services.edit-service-attributes', compact(
                'service',
                'service_includes',
                'service_additionals',
                'service_benifits',
                'online_service_faq',
            ));
        }else{
            abort(404);
        }
        
    }

    public function ServiceDelete($id = null)
    {
        Serviceinclude::where('service_id',$id)->delete();
        Serviceadditional::where('service_id',$id)->delete();
        Servicebenifit::where('service_id',$id)->delete();
        OnlineServiceFaq::where('service_id',$id)->delete();
        Service::find($id)->delete();
        toastr_error(__('Service Delete Success---'));
        return redirect()->back();
    }

    public function showServiceAttributesById($id=null)
    {
        $seller_id = Auth::guard('web')->user()->id;
        $service = Service::select('id','title','image')
        ->where('id',$id)
        ->where('seller_id',$seller_id)
        ->first();

        if(!empty($service)){
        $include_service = Serviceinclude::where('service_id',$id)->get();
        $additional_service = Serviceadditional::where('service_id',$id)->get();
        $service_benifit = Servicebenifit::where('service_id',$id)->get();
        return view('frontend.user.seller.services.show-service-attributes-by-id', compact('service','include_service','additional_service','service_benifit'));
        }
        abort(404);
    }

    public function deleteIncludeService($id = null)
    {
        $include_details = Serviceinclude::find($id);
        
        //todo udpate service price
        $service_details = Service::where('id',$include_details->service_id)->first();
        $service_details->price -= $include_details->include_service_price * $include_details->include_service_quantity;
        $service_details->save();
        
        $include_details->delete();
        
        
        toastr_error(__('Include Service Delete Success---'));
        return redirect()->back();
    }

    public function deleteAdditionalService($id = null)
    {
        Serviceadditional::find($id)->delete();
        toastr_error(__('Additional Service Delete Success---'));
        return redirect()->back();
    }

    public function deleteBenifit($id = null)
    {
        Servicebenifit::find($id)->delete();
        toastr_error(__('Service Benifit Delete Success---'));
        return redirect()->back();
    }

    //dates 
    public function days()
    {
        $days = Day::with('schedules')->where('seller_id',Auth::guard('web')->user()->id)->get();
        $total_day = Day::select('total_day')->where('seller_id',Auth::guard('web')->user()->id)->first();
        return view('frontend.user.seller.day-and-schedule.days',compact('days','total_day'));
    }

    public function addDay(Request $request)
    {
        $request->validate([
            'day' => 'required',
        ]);

        $day = Day::select('day','seller_id')
        ->where('seller_id',Auth::guard('web')->user()->id)
        ->where('day',$request->day)
        ->first();
        if(!empty($day)){
            toastr_error(__('Day Already Exists---'));
            return redirect()->back();
        }

        Day::create([
            'day' => $request->day,
            'status' => 0,
            'seller_id' => Auth::guard('web')->user()->id,
            'total_day' => 7,
        ]);

        toastr_success(__('Day Added Success---'));
        return redirect()->back();
    }

    public function dayDelete($id = null)
    {   
        Schedule::where('day_id',$id)->delete();
        Day::find($id)->delete();
        toastr_error(__('Day Delete Success---'));
        return redirect()->back();
    }

    public function updateTotalDay(Request $request){
        Day::where('seller_id',Auth::guard('web')->user()->id)
        ->update(['total_day'=>$request->total_day]);
        toastr_success(__('Service Day Update Success---'));
        return redirect()->back();
    }

     //schedules 
     public function schedules()
     {
         $schedules = Schedule::with('days')->where('seller_id',Auth::guard('web')->user()->id)->paginate(10);
         $days = Day::where('seller_id',Auth::guard('web')->user()->id)->get();
         return view('frontend.user.seller.day-and-schedule.schedules',compact('schedules','days'));
     }

     public function addSchedule(Request $request)
     {
        $request->validate([
            'day_id' => 'required',
            'schedule' => 'required',
        ]);

        Schedule::create([
            'day_id' => $request->day_id,
            'seller_id' => Auth::guard('web')->user()->id,
            'schedule' => $request->schedule,
            'status' => 0,
            
        ]);

        toastr_success(__('Schedule Added Success---'));
        return redirect()->back();
     }

    public function editSchedule(Request $request)
    {
        $request->validate([
            'up_day_id' => 'required',
            'up_schedule' => 'required',
        ]);

        Schedule::where('id',$request->up_id)->update([
            'day_id' => $request->up_day_id,
            'seller_id' => Auth::guard('web')->user()->id,
            'schedule' => $request->up_schedule,
        ]);

        toastr_success(__('Schedule Update Success---'));
        return redirect()->back();
    }

    public function scheduleDelete($id = null)
    {   
        Schedule::find($id)->delete();
        toastr_error(__('Schedule Delete Success---'));
        return redirect()->back();
    }

    //orders
    public function pendingOrders()
    {
        $pending_orders = Order::with('service')
        ->where('seller_id', Auth::guard('web')->user()->id)
        ->where('status',0)
        ->orWhere('status',1)
        ->paginate(10);
        return view('frontend.user.seller.order.pending-orders', compact('pending_orders'));
    }

    public function orderDelete($id=null)
    {
        $order = Order::find($id);
        if($order->payment_status == 'pending' || $order->payment_status == ''){
            Order::find($id)->delete();
            toastr_error(__('Order Delete Success---'));
        }else{
            toastr_error(__('Order Can Not be Deleted Due to Payment Status Complete---'));
        }
        return redirect()->back();
    }

    public function sellerOrders()
    {
        $orders = Order::with('online_order_ticket')
            ->where('seller_id', Auth::guard('web')->user()->id)
            ->where('payment_status', '!=','')
            ->latest()
            ->paginate(10);
        
        $active_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',1);
        $complete_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',2);
        $deliver_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',3);
        $cancel_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',4);
        return view('frontend.user.seller.order.orders', compact('orders','active_orders','complete_orders','deliver_orders','cancel_orders'));
    }

    public function activeOrders()
    {
        $orders = Order::where('seller_id', Auth::guard('web')->user()->id);
        $active_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',1)->paginate(10);
        $complete_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',2);
        $deliver_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',3);
        $cancel_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',4);
        return view('frontend.user.seller.order.active-orders', compact('orders','active_orders','complete_orders','deliver_orders','cancel_orders'));
    }

    public function completeOrders()
    {
        $orders = Order::where('seller_id', Auth::guard('web')->user()->id);
        $active_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',1);
        $complete_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',2)->paginate(10);
        $deliver_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',3);
        $cancel_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',4);
        return view('frontend.user.seller.order.complete-orders', compact('orders','active_orders','complete_orders','deliver_orders','cancel_orders'));
    }

    public function deliverOrders()
    {
        $orders = Order::where('seller_id', Auth::guard('web')->user()->id);
        $active_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',1);
        $complete_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',2);
        $deliver_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',3)->paginate(10);
        $cancel_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',4);
        return view('frontend.user.seller.order.deliver-orders', compact('orders','active_orders','complete_orders','deliver_orders','cancel_orders'));
    }

    public function cancelOrders()
    {
        $orders = Order::where('seller_id', Auth::guard('web')->user()->id);
        $active_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',1);
        $complete_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',2);
        $deliver_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',3);
        $cancel_orders = Order::where('seller_id', Auth::guard('web')->user()->id)->where('status',4)->paginate(10);
        return view('frontend.user.seller.order.cancel-orders', compact('orders','active_orders','complete_orders','deliver_orders','cancel_orders'));
    }

    public function orderDetails($id=null)
    {
        $order_details = Order::where('id',$id)->where('seller_id',Auth::guard('web')->user()->id)->first();
        if(!empty($order_details)){
            $order_includes = OrderInclude::where('order_id',$id)->get();
            $order_additionals = OrderAdditional::where('order_id',$id)->get();
            foreach(Auth::guard('web')->user()->unreadNotifications()->where('data->order_message' , 'You have a new order')->get() as $notification){
                if($order_details->id == $notification->data['order_id']){
                    $Notification = Auth::guard('web')->user()->Notifications->find($notification->id);
                    if($Notification){
                        $Notification->markAsRead();
                    }
                    return view('frontend.user.seller.order.order-details', compact('order_details','order_includes','order_additionals'));
                } 
            }
            return view('frontend.user.seller.order.order-details', compact('order_details','order_includes','order_additionals'));
        }else{
            abort(404);
        }
        
    }

    public function orderStatus(Request $request,$id=null)
    {
        $payment_status = Order::select('id','payment_status','status','email','name')->where('id',$request->order_id)->first();
        $cancel_order_money_return = Order::select('id','cancel_order_money_return')->where('id',$request->order_id)->first();
        if($cancel_order_money_return->cancel_order_money_return === 1){
            toastr_error(__('You can not change status because earlier you canceled the order'));
            return redirect()->back();
        }
        if($payment_status->status !=2){
            if($payment_status->payment_status =='complete'){
                if($request->status==2){
                    Order::where('id',$request->order_id)->update(['order_complete_request'=>1]);
                    toastr_success(__('Your request submitted. Buyer will complete your request after review'));

                    //Send email after change status
                    try {
                        $message_body_buyer =__('Hello, ').$payment_status->name. __(' A new request is created for complete an order.').'</br>' . ' <span class="verify-code">'.__('Order ID is: ') . $payment_status->id. '</span>';
                        $message_body_admin =__('Hello Admin A new request is created for complete an order.').'</br>' . ' <span class="verify-code">'.__('Order ID is: ') . $payment_status->id. '</span>';
                        Mail::to($payment_status->email)->send(new BasicMail([
                            'subject' => __('New Request For Complete an Order'),
                            'message' => $message_body_buyer
                        ]));
                        Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                            'subject' => __('New Request For Complete an Order'),
                            'message' => $message_body_admin
                        ]));
                    } catch (\Exception $e) {
                        return redirect()->back()->with(FlashMsg::item_new($e->getMessage()));
                    }
                    return redirect()->back(); 
                }

                //get old status
                if($payment_status->status ==0){
                    $old_status = 'Pending';
                }elseif($payment_status->status==1){
                    $old_status = 'Active';
                }elseif($payment_status->status==3){
                    $old_status = 'Delivered';
                }elseif($payment_status->status==4){
                    $old_status = 'Cancelled';
                }

                Order::where('id',$request->order_id)->update(['status'=>$request->status]);

                //get new status
                if($request->status==0){
                    $new_status = 'Pending';
                }elseif($request->status==1){
                    $new_status = 'Active';
                }elseif($request->status==3){
                    $new_status = 'Delivered';
                }elseif($request->status==4){
                    $new_status = 'Cancelled';
                }

                try {
                    $message_body = __('Order status has been changed. '). $old_status.__(' to ').$new_status .'</br>'.'<span class="verify-code">'.__('Order Id: ') .$payment_status->id.'</span>';
                    Mail::to($payment_status->email)->send(new BasicMail([
                        'subject' => __('Order Status Changed.'),
                        'message' => $message_body
                    ]));
                    Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                        'subject' => __('Order Status Changed.'),
                        'message' => $message_body
                    ]));
                } catch (\Exception $e) {
                    return redirect()->back()->with(FlashMsg::item_new($e->getMessage()));
                }
                toastr_success(__('Status Change Success---'));
                return redirect()->back();
            }else{
                toastr_error(__('You can not change order status due to payment status pending'));
                return redirect()->back();
            }
        }else{
            toastr_error(__('You can not change order status because this order already completed.'));
            return redirect()->back();
        }
        
    }

    public function orderPaymentStatus(Request $request,$id=null)
    {
        $this->validate($request,[
           'order_id' => 'required',
           'status' => 'required|string'
        ]);
        $payment_status = Order::select('payment_status','status')->where(['id' => $request->order_id,'seller_id' => Auth::guard('web')->id()])->first();
        if (!is_null($payment_status)){
            Order::where(['id' => $request->order_id,'seller_id' => Auth::guard('web')->id()])->update([
              'payment_status' =>  $request->status
            ]);
        }
        toastr_success(sprintf(__('Payment Status Has been changed to %s'),$request->status));
        return redirect()->back();
    }

    //seller report
    public function reportUs(Request $request)
    {
        $request->validate([
            'report' => 'required',
        ]);

        $seller_id = Auth::guard()->check() ? Auth::guard('web')->user()->id : NULL;
        $is_report_exist = Report::where(['order_id'=>$request->order_id , 'report_from'=>'seller'])->first();

        if($is_report_exist){
            toastr_error(__('Report Already Created For This Order'));
            return redirect()->back();
        }
        $report = Report::create([
            'order_id' => $request->order_id,
            'service_id' => $request->service_id,
            'seller_id' => $seller_id,
            'buyer_id' => $request->buyer_id,
            'report_from' => 'seller',
            'report_to' => 'buyer',
            'report' => $request->report,
        ]);

        $last_report_id = $report->id;
        try {
            $message_body = __('Hello, new report is just created. Please check , thanks').'</br>'.'<span class="verify-code">'.__('Report ID: ').$last_report_id.'</span>';
            Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                'subject' => __('New Report'),
                'message' => $message_body
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with(FlashMsg::item_new($e->getMessage()));
        }

        toastr_success(__('Report Send Success'));
        return redirect()->back();
    }

    //payout request 
    public function payoutRequest(Request $request,$id=null)
    {
        $total_earnings = 0;
        $seller_id = Auth::guard('web')->user()->id;
        $all_payout_request = PayoutRequest::where('seller_id',$seller_id)->paginate(10);

        $pending_order = Order::where(['status'=>0,'seller_id'=>$seller_id])->count();
        $complete_order = Order::where(['status'=>2,'seller_id'=>$seller_id])->count();
        $complete_order_balance_with_tax = Order::where(['status'=>2,'seller_id'=>$seller_id])->sum('total');
        $complete_order_tax = Order::where(['status'=>2,'seller_id'=>$seller_id])->sum('tax');
        $complete_order_balance_without_tax = $complete_order_balance_with_tax - $complete_order_tax;
        $admin_commission_amount = Order::where(['status'=>2,'seller_id'=>$seller_id])->sum('commission_amount');
        $remaning_balance = $complete_order_balance_without_tax-$admin_commission_amount;
        $total_earnings = PayoutRequest::where('seller_id',$seller_id)->sum('amount');
        
        return view('frontend.user.seller.payout.payout-request',compact(
            'pending_order','complete_order','remaning_balance','all_payout_request','total_earnings'
        ));
    }

    public function createPayoutRequest(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'amount' => 'required|numeric',
                'payment_gateway' => 'required|string|max:191',
             ],[
                 'amount.required' => __('Amount required'),
                 'amount.numeric' => __('Amount must be numeric'),
                 'payment_gateway.required' =>  __('Payment Gateway required'),
             ]);

             $seller_id = Auth::guard('web')->user()->id;

            $complete_order_balance_with_tax = Order::where(['status'=>2,'seller_id'=>$seller_id])->sum('total');
            $complete_order_tax = Order::where(['status'=>2,'seller_id'=>$seller_id])->sum('tax');
            $complete_order_balance_without_tax = $complete_order_balance_with_tax - $complete_order_tax;
            $admin_commission_amount = Order::where(['status'=>2,'seller_id'=>$seller_id])->sum('commission_amount');
            $remaning_balance = $complete_order_balance_without_tax-$admin_commission_amount;
            $total_earnings = PayoutRequest::where('seller_id',$seller_id)->sum('amount');

             $available_balance = $remaning_balance - $total_earnings;
             if($request->amount<=0 || $request->amount >$available_balance){
                toastr_error(__('Enter a valid amount'));
                return redirect()->back();
             }  
             
             $min_amount = AmountSettings::select('min_amount')->first();
             $max_amount = AmountSettings::select('max_amount')->first();
             if($request->amount < $min_amount->min_amount){
                 $msg = sprintf(__('Withdraw amount not less than %s'),float_amount_with_currency_symbol($min_amount->min_amount));
                toastr_error($msg);
                return redirect()->back();
             } 
             if($request->amount > $max_amount->max_amount){
                $msg = sprintf(__('Withdraw amount must less or equal to %s'),float_amount_with_currency_symbol($max_amount->max_amount));
               toastr_error($msg);
               return redirect()->back();
            }

             PayoutRequest::create([
                'seller_id' => Auth::guard('web')->user()->id,
                'amount' => $request->amount,
                'payment_gateway' => $request->payment_gateway,
                'seller_note' => $request->seller_note,
                'status' => 0,
            ]);

            $last_payout_request_id = DB::getPdo()->lastInsertId();
            try {
                $message_body = __('Hello admin new payout request is just created. Please check , thanks').'</br>'.'<span class="verify-code">'.__('Payout Request ID: ').$last_payout_request_id.'</span>';
                Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                    'subject' => __('New Payout Request'),
                    'message' => $message_body
                ]));
            } catch (\Exception $e) {
                return redirect()->back()->with(FlashMsg::item_new($e->getMessage()));
            }

            toastr_success(__('Payment request create success'));
            return redirect()->back(); 
            
        }
    }

    public function PayoutRequestDetails($id=null)
    {
        $request_details = PayoutRequest::where('id',$id)
        ->where('seller_id',Auth::guard('web')
        ->user()->id)
        ->first();
        if($request_details != ''){
            return view('frontend.user.seller.payout.payout-request-details',compact('request_details'));
        }else{
            abort(404);
        }
        
    }

    //reviews 
    public function serviceReview()
    {
        $services = Service::whereHas('reviews')->where('seller_id', Auth::user()->id)->paginate(10);
        return view('frontend.user.seller.services.service-reviews', compact('services'));
    }

    public function serviceReviewAll($id=null)
    {
        $service_reviews = Review::where('service_id',$id)
        ->where('seller_id',Auth::guard('web')->user()->id)
        ->paginate(10);

        if($service_reviews->count() >=1){
            return view('frontend.user.seller.services.service-all-reviews', compact('service_reviews'));
        }else{
            abort(404);
        }
        
    }

    public function reviewDelete($id=null)
    {
        Review::find($id)->delete();
        toastr_error(__('Review Delete Success---'));
        return redirect()->back();
    }

    public function allTickets()
    {
        $tickets = SupportTicket::where('seller_id',Auth::guard('web')
            ->user()->id)
            ->orderBy('id','Desc')
            ->paginate(10);

        $orders = Order::where('seller_id', Auth::guard('web')->user()->id)
            ->where('payment_status', '!=','')
            ->whereNotNull('buyer_id',)
            ->latest()->get();
        return view('frontend.user.seller.support-ticket.all-tickets', compact('tickets','orders'));
    }

    public function addNewTicket(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $seller_id = Auth::guard('web')->user()->id;
            if($request->order_id){
                $buyer_id = Order::select('buyer_id')->where('id',$request->order_id)->first();
            }

            $this->validate($request,[
                'title' => 'required|string|max:191',
                'subject' => 'required|string|max:191',
                'priority' => 'required|string|max:191',
                'description' => 'required|string',
            ],[
                'title.required' => __('title required'),
                'subject.required' =>  __('subject required'),
                'priority.required' =>  __('priority required'),
                'description.required' => __('description required'),
            ]);


            SupportTicket::create([
                'title' => $request->title,
                'description' => $request->description,
                'subject' => $request->subject,
                'status' => 'open',
                'priority' => $request->priority,
                'seller_id' => $seller_id,
                'buyer_id' => $buyer_id->buyer_id,
                'order_id' => $request->order_id,
            ]);
            toastr_success(__('Ticket successfully created.'));
            $last_ticket_id = DB::getPdo()->lastInsertId();
            $last_ticket = SupportTicket::where('id',$last_ticket_id)->first();

            // send order ticket notification to buyer
            $buyer = User::where('id',$last_ticket->buyer_id)->first();
            if($buyer){
                $order_ticcket_message = __('You have a new order ticket');
                $buyer ->notify(new TicketNotification($last_ticket_id , $seller_id, $last_ticket->buyer_id,$order_ticcket_message ));
            }
            return redirect()->back();
        }

        $order = Order::select('id','service_id','buyer_id')
            ->where('id',$id)
            ->where('seller_id',Auth::guard('web')->user()->id)
            ->first();
        return view('frontend.user.seller.support-ticket.add-new-ticket', compact('order'));
    }

    public function ticketDelete($id=null)
    {
        SupportTicket::find($id)->delete();
        toastr_error(__('Ticket Delete Success---'));
        return redirect()->back();
    }

    //view ticket 
    public function view_ticket(Request $request,$id){
        $ticket_details = SupportTicket::findOrFail($id);
        $all_messages = SupportTicketMessage::where(['support_ticket_id'=>$id])->get();
        $q = $request->q ?? '';

        foreach(Auth::guard('web')->user()->notifications as $notification){
            if($ticket_details->id == array_key_exists("seller_last_ticket_id",$notification->data)){
                $Notification = Auth::guard('web')->user()->Notifications->find($notification->id);
                if($Notification){
                    $Notification->markAsRead();
                }
                return view('frontend.user.seller.support-ticket.view-ticket', compact('ticket_details','all_messages','q'));
            }
        }
        return view('frontend.user.seller.support-ticket.view-ticket', compact('ticket_details','all_messages','q'));
    }


    //priority status 
    public function priorityChange(Request $request)
    {
        SupportTicket::where('id',$request->ticket_id)->update(['priority'=>$request->priority]);
        toastr_success(__('Priority Change Success---'));
        return redirect()->back();
    }

    //change status 
    public function statusChange($id=null)
    {
        $status = SupportTicket::find($id);
        if($status->status=='open'){
            $status = 'close';
        }else{
            $status = 'open';
        }
        SupportTicket::where('id',$id)->update(['status'=>$status]);
        toastr_success(__('Status Change Success---'));
        return redirect()->back();
    }

    //send message 
    public function support_ticket_message(Request $request)
    {
        $this->validate($request,[
            'ticket_id' => 'required',
            'user_type' => 'required|string|max:191',
            'message' => 'required',
            'send_notify_mail' => 'nullable|string',
            'file' => 'nullable|mimes:zip',
        ]);

        $ticket_info = SupportTicketMessage::create([
            'support_ticket_id' => $request->ticket_id,
            'type' => $request->user_type,
            'message' => $request->message,
            'notify' => $request->send_notify_mail ? 'on' : 'off',
        ]);

        if ($request->hasFile('file')){
            $uploaded_file = $request->file;
            $file_extension = $uploaded_file->getClientOriginalExtension();
            $file_name =  pathinfo($uploaded_file->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.$file_extension;
            $uploaded_file->move('assets/uploads/ticket',$file_name);
            $ticket_info->attachment = $file_name;
            $ticket_info->save();
        }

        //send mail to user
        event(new SupportMessage($ticket_info));
        return redirect()->back()->with(FlashMsg::item_new('Message Send'));
    } 

    //to do list 
    public function toDoList()
    {
        $to_do_list = ToDoList::where('user_id',Auth::guard('web')->user()->id)->paginate(10);
        return view('frontend.user.seller.to-do-list.todolist',compact('to_do_list'));
    }

    public function addTodolist(Request $request)
    {
      $request->validate([
            'description' => 'required',
        ]);

        ToDoList::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::guard('web')->user()->id,
            
        ]);

        toastr_success(__('To Do List Added Success---'));
        return redirect()->back();
    }

    public function updateTodolist(Request $request)
    {
        $request->validate([
            'up_description' => 'required',
        ]);

        ToDoList::where('id',$request->up_id)->update([
            'title' => $request->up_title,
            'description' => $request->up_description,
        ]);

        toastr_success(__('To Do List Update Success---'));
        return redirect()->back();
    }

    public function deleteTodolist($id = null)
    {   
        ToDoList::find($id)->delete();
        toastr_error(__('To Do List Delete Success---'));
        return redirect()->back();
    }

    public function changeTodoStatus($id=null)
    {
        $status = ToDoList::select('status')->where('id', $id)->first();
        if ($status->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        ToDoList::where('id',$id)->update([
            'status' => $status,
        ]);
        toastr_success(__('ToDo List status Update Success---'));
        return redirect()->back();
    }

    //notifications 
    public function allNotification(){
        return view('frontend.user.seller.notification.all-notification');
    }

    //seller verify
    public function sellerVerify(Request $request){
        $user = Auth::guard('web')->user()->id;

        if($request->isMethod('post')){
            $request->validate([
                'national_id' => 'required|max:191',
            ]);

            $old_image = SellerVerify::select('national_id','address')->where('seller_id',$user)->first();
          
            if(is_null($old_image)){
                SellerVerify::create([
                    'seller_id' => $user,
                    'national_id' => $request->national_id ?? optional($old_image)->national_id,
                    'address' => $request->address ?? optional($old_image)->address,
                ]);
            }else{
                SellerVerify::where('seller_id', $user)
                ->update([
                    'seller_id' => $user,
                    'national_id' => $request->national_id ?? optional($old_image)->national_id,
                    'address' => $request->address ?? optional($old_image)->address,
                ]);
            }
            
            toastr_success(__('Verify Info Update Success---'));
            return redirect()->back();
        }
        $seller_verify_info = SellerVerify::where('seller_id',$user)->first();
        return view('frontend.user.seller.profile-verify.seller-profile-verify',compact('seller_verify_info'));
    }
}