@if(Auth::guard('web')->check())
<div class="login-account">
    <li>
        <div class="info-bar-item-two">
            <div class="author-thumb">
                @if(!empty(Auth::guard('web')->user()->image))
                    {!! render_image_markup_by_attachment_id(Auth::guard('web')->user()->image) !!}
                @else
                    <i class="las la-user"></i>
                @endif
                
            </div>
            <a class="accounts loggedin" href="javascript:void(0)">
                <span class="title"> {{Auth::guard('web')->user()->name}} </span>
            </a>
            <ul class="account-list-item mt-2">
                <li class="list"> 
                    @if(Auth::guard('web')->user()->user_type==0)
                    <a href="{{ route('seller.dashboard')}}"> {{ __('Dashboard') }} </a> 
                    @else 
                    <a href="{{ route('buyer.dashboard')}}"> {{ __('Dashboard') }} </a> 
                    @endif
                </li>
                <li class="list"> <a href="{{ route('seller.logout')}}"> {{ __('Logout') }} </a> </li>
            </ul>
        </div>
    </li>
</div>
@else
    <div class="login-account">
        <a class="accounts" href="javascript:void(0)"> <span class="account">{{ __('Account') }}</span> <i class="las la-user"></i> </a>
        <ul class="account-list-item mt-2">
            <li class="list"> <a href="{{ route('user.register') }}"> {{ __('Sign Up') }} </a> </li>
            <li class="list"> <a href="{{ route('user.login') }}">{{ __('Sign In') }} </a> </li>
        </ul>
    </div>
@endif


