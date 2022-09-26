<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\BasicMail;
use App\ServiceCity;
use App\ServiceArea;
use App\Country;
use App\SellerVerify;
use App\Profile;
use Toastr;
use Str;
USE Auth;
use Session;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/';
    public function redirectTo(){
        return route('homepage');
    }
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'captcha_token' => ['nullable'],
            'username' => ['required', 'string', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'captcha_token.required' => __('google captcha is required'),
            'name.required' => __('name is required'),
            'name.max' => __('name is must be between 191 character'),
            'username.required' => __('username is required'),
            'username.max' => __('username is must be between 191 character'),
            'username.unique' => __('username is already taken'),
            'email.unique' => __('email is already taken'),
            'email.required' => __('email is required'),
            'password.required' => __('password is required'),
            'password.confirmed' => __('both password does not matched'),
        ]);
    }
    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admins'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['user_name'],
            'phone' => $data['phone'],
            'service_city' => $data['service_city'],
            'service_area' => $data['service_area'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function userRegister(Request $request)
    {   
        if($request->isMethod('post')){
            // return $request;

            $request->validate([
                'type' => 'required',
                'name' => 'required|max:191',
                'email' => 'required|email|unique:users|max:191',
                'username' => 'required|unique:users|max:191',
                'phone' => 'required|unique:users|max:191',
                'password' => 'required|max:191',
                'service_city' => 'required',
                'service_area' => 'required',
                'country' => 'required',
                'recognition' => 'required',
                'education' => 'required',
                'skills' => 'required',
                'time_availability' => 'required',
                'resume' => 'required',
            ]);

            $email_verify_tokn = Str::random(8);
            $user = User::create([
                'type' => $request->type,
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'reg_year' => $request->reg_year,
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'service_city' => $request->service_city,
                'service_area' => $request->service_area,
                'country_id' => $request->country,
                'user_type' => $request->get_user_type,
                'terms_conditions' =>1,
                'email_verify_token'=> $email_verify_tokn,
            ]);

            $resume_file = '';
            if (isset($request->resume)) {
                $resume = date('d-m-Y-His').'.'.$request->file('resume')->getClientOriginalExtension();
                $request->resume->move(public_path('/assets/resumes'), $resume);
    
                $resume_file = $resume;
            }

            if($user ){
                Profile::create([
                    'user_id' => $user->id,
                    'recognition' => $request->recognition,
                    'references' => $request->references,
                    'reference_mobile_no' => $request->reference_mobile_no,
                    'education' => $request->education,
                    'certifications' => $request->certifications,
                    'skills' => $request->skills,
                    'experience' => $request->experience,
                    'apps_developed' => $request->apps_developed,
                    'linkedin_profile_link' => $request->linked_profile_link,
                    'github_profile_link' => $request->github_profile_link,
                    'time_availability' => $request->time_availability,
                    'projects_like_to_work' => $request->projects_like_to_work,
                    'resume' => $resume_file,
                    'short_bio' => $request->short_bio,
                ]);

                if($request->get_user_type==0){
                    $user_type = 'Seller';
                }else{
                    $user_type = 'Buyer';
                }
                
                try {
                    $message_body = __('You have new user as a '). $user_type.'</br>'.'<span class="verify-code">'.__('Your account infos--- ').'</br>' .__('Username: ').$request->username. '</br>'.__(' Email: ').$request->email. '</span>';
                    Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                        'subject' => __('New User Registration'),
                        'message' => $message_body
                    ]));
                } catch (\Exception $e) {
                    return redirect()->back()->with(FlashMsg::item_new($e->getMessage()));
                }
            }


            if($request->get_user_type==0){
                $last_order_id = DB::getPdo()->lastInsertId();
                 SellerVerify::create([
                    'seller_id' => $last_order_id,
                    'status' => 0,
                ]);
            }
            

             if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
                if(Auth::user()->user_type==0){
                    return redirect()->route('seller.dashboard');
                }else{
                   return redirect()->route('buyer.dashboard');
                }
            }
            
            return back()->with([
                   'msg' => __('Email or password does not match'),
                   'type' => 'danger',
            ]);
        }

        $cities = ServiceCity::all();
        $countries = Country::all();
        return view('frontend.user.register',compact('cities','countries'));
    }

    public function getCity(Request $request)
    {
        $cities = ServiceCity::where('country_id', $request->country_id)->where('status', 1)->get();
        return response()->json([
            'status' => 'success',
            'cities' => $cities,
        ]);
    }

    public function getAarea(Request $request)
    {
        $areas = ServiceArea::where('service_city_id', $request->city_id)->where('status', 1)->get();
        return response()->json([
            'status' => 'success',
            'areas' => $areas,
        ]);
    }

    public function emailVerify(Request $request)
    {   
        $user_details = Auth::guard('web')->user();
        
        if($request->isMethod('post')){

            $this->validate($request,[
                'email_verify_token' => 'required|max:191'
            ],[
                'email_verify_token.required' => __('verify code is required')
            ]);
            
            $user_details = User::where(['email_verify_token' => $request->email_verify_token,'email' => $user_details->email ])->first();
            
            if(!is_null($user_details)){
                $user_details->email_verified = 1;
                $user_details->save();
                 if($user_details->user_type==0){
                    return redirect()->route('seller.dashboard');
                }else{
                   return redirect()->route('buyer.dashboard');
                }
            }
            
            return redirect()->back()->with(['msg' => __('Your verification code is wrong.') ,'type' => 'danger' ]);
        }
        
        
        $verify_token = $user_details->email_verify_token ?? null;
       
       try {
           //check user has verify token has or not
          
            if(is_null($verify_token)){
                
                $verify_token = Str::random(8);
                $user_details->email_verify_token = Str::random(8);
                $user_details->save();
                
                $message_body = __('Hello').' '.$user_details->name.' <br>'.__('Here is your verification code').' <span class="verify-code">'.$verify_token.'</span>';
                Mail::to($user_details->email)->send(new BasicMail([
                    'subject' => sprintf(__('Verify your email address %s'),get_static_option('site_title')),
                    'message' => $message_body
                ]));
                
            }   
        
        }catch (\Exception $e){
            
        }
        
        return view('frontend.user.email-verify'); 
    }
    
    public function resendCode(){
        $user_details = Auth::guard('web')->user();
        $verify_token = $user_details->email_verify_token ?? null;
             
        try {
            
                if(is_null($verify_token)){
                    $verify_token = Str::random(8);
                    $user_details->email_verify_token = Str::random(8);
                    $user_details->save();
                }
                
                $message_body = __('Hello').' '.$user_details->name.' <br>'.__('Here is your verification code').' <span class="verify-code">'.$verify_token.'</span>';
                
                Mail::to($user_details->email)->send(new BasicMail([
                    'subject' => sprintf(__('Verify your email address %s'),get_static_option('site_title')),
                    'message' => $message_body
                ]));
            
            
         
        }catch (\Exception $e){
            
        }
        
        return redirect()->back()->with(['msg' => __('Resend Email Verify Code, Please check your inbox of spam.') ,'type' => 'success' ]);
    }
}