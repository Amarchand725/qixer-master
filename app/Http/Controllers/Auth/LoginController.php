<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\BasicMail;
use App\User;
use Session;
use Str;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';
    public function redirectTo()
    {
        return route('homepage');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Override username functions
     * @since 1.0.0
     * */
    public function username()
    {
        return 'username';
    }

    /**
     * show admin login page
     * @since 1.0.0
     * */
    public function showAdminLoginForm()
    {
        return view('auth.admin.login');
    }

    /**
     * admin login system
     * */
    public function adminLogin(Request $request)
    {
        $email_or_username = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:6'
        ], [
            'username.required' => sprintf(__('%s required'),$email_or_username),
            'password.required' => __('password required')
        ]);

        if (Auth::guard('admin')->attempt([$email_or_username => $request->username, 'password' => $request->password], $request->get('remember'))) {

            return response()->json([
                'msg' => __('Login Success Redirecting'),
                'type' => 'success',
                'status' => 'ok'
            ]);
        }
        return response()->json([
            'msg' => sprintf(__('Your %s or Password Is Wrong !!'),$email_or_username),
            'type' => 'danger',
            'status' => 'not_ok'
        ]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function userLogin(Request $request)
    {
        if($request->isMethod('post')){
            $email_or_username = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|min:6'
            ],
            [
            'username.required' => sprintf(__('%s required'),$email_or_username),
            'password.required' => __('password required')
            ]);
    
           
            if (Auth::guard('web')->attempt([$email_or_username => $request->username, 'password' => $request->password],$request->get('remember'))){
                if(Auth::user()->user_type==0){
                    return response()->json([
                        'msg' => __('Login Success Redirecting'),
                        'type' => 'success',
                        'status' => 'seller-login'
                    ]);
                }else{
                    return response()->json([
                        'msg' => __('Login Success Redirecting'),
                        'type' => 'success',
                        'status' => 'buyer-login'
                    ]);
                }
                
            }
            return response()->json([
                'msg' => sprintf(__('Your %s or Password Is Wrong !!'),$email_or_username),
                'type' => 'danger',
                'status' => 'not_ok'
            ]);
        }
        return view('frontend.user.login');
    }

    public function userLoginOnline(Request $request)
    {
            $email_or_username = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|min:6'
            ],
            [
            'username.required' => sprintf(__('%s required'),$email_or_username),
            'password.required' => __('password required')
            ]);

            if (Auth::guard('web')->attempt([$email_or_username => $request->username, 'password' => $request->password],$request->get('remember'))){

                return redirect()->back();

            }
            return redirect()->back();
    }

    public function userForgetPassword(Request $request){

        if($request->isMethod('post')){
            $this->validate($request,[
                'email' => 'required|email'
            ],[
                'email.required' => __('Email is required')
            ]);

            $email = User::select('email')->where('email',$request->email)->count();
            if($email >= 1){
                $password = Str::random(6);
                $new_password = Hash::make($password );
                User::where('email',$request->email)->update(['password'=>$new_password]);
                try {
                    $message_body = __('Here is your new password').' <span class="verify-code">'.$password.'</span>';
                    Mail::to($request->email)->send(new BasicMail([
                        'subject' => __('Your new password send'),
                        'message' => $message_body
                    ]));
                }catch (\Exception $e){
                    
                }

                return redirect()->back()->with(['msg' => __('Password generate success.Check email for new password'),'type' => 'success' ]);
            }
            return redirect()->back()->with(Session::flash('msg', __('Email does not exists') ));
        }
        return view('frontend.user.forget-password-form');
    }

}
