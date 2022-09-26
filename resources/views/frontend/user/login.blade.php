@extends('frontend.frontend-master')
@section('site-title')
    {{__('User Login')}}
@endsection
@section('content')
<div class="signup-area padding-top-70 padding-bottom-100">
    <div class="container">
        <div class="signup-wrapper">
            <div class="signup-contents">
                <h3 class="signup-title"> {{ get_static_option('login_form_title') ?? __('Login to your account') }}</h3>

                @if(Session::has('msg'))
                <p class="alert alert-{{Session::get('type') ?? 'success'}}">{{ Session::get('msg') }}</p>
                @endif
                <div class="error-message"></div>

                <form class="signup-forms" action="{{ route('user.login')}}" method="post">
                    @csrf
                    <div class="single-signup margin-top-30">
                        <label class="signup-label"> {{'Username or Email *'}} </label>
                        <input class="form--control" type="text" name="username" id="username" placeholder="{{__('Username or Email')}}">
                    </div>
                    <div class="single-signup margin-top-30">
                        <label class="signup-label"> {{ __('Password*') }} </label>
                        <input class="form--control" type="password" name="password" id="password" placeholder="{{__('Password')}}">
                    </div>
                    <div class="signup-checkbox">
                        <div class="checkbox-inlines">
                            <input class="check-input" name="remember" id="remember" type="checkbox" id="check8">
                            <label class="checkbox-label" for="remember"> {{ __('Remember me ')}}</label>
                        </div>
                        <div class="forgot-btn">
                            <a href="{{ route('user.forget.password') }}" class="forgot-pass"> {{ __('Forgot Password ') }}</a>
                        </div>
                    </div>
                    <button id="signin_form" type="submit">{{ __('Login Now') }}</button>
                    <span class="bottom-register"> {{ __('Do not have Account?')}} <a class="resgister-link" href="{{ route('user.register')}}"> Register </a> </span>
                </form>

                <div class="social-login-wrapper">
                    @if(get_static_option('enable_google_login') || get_static_option('enable_facebook_login'))
                    <div class="bar-wrap">
                        <span class="bar"></span>
                        <p class="or">{{ __('or') }}</p>
                        <span class="bar"></span>
                    </div>
                    @endif

                    <div class="sin-in-with">
                        @if(get_static_option('enable_google_login'))
                        <a href="{{ route('login.google.redirect') }}" class="sign-in-btn">
                            <img src="{{ asset('assets/frontend/img/static/google.png') }}" alt="icon">
                            {{ __('Sign in with Google') }}
                        </a>
                        @endif
                        @if(get_static_option('enable_facebook_login'))
                        <a href="{{ route('login.facebook.redirect') }}" class="sign-in-btn">
                            <img src="{{ asset('assets/frontend/img/static/facebook.png') }}" alt="icon">
                            {{ __('Sign in with Facebook') }}
                        </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        "use strict";
        $(document).ready(function () {
            $(document).on('click','#signin_form',function (e){
                e.preventDefault();
                var el = $(this);
                var erContainer = $(".error-message");
                erContainer.html('');
                el.text('{{__('Please Wait..')}}');
                $.ajax({
                    url: "{{route('user.login')}}",
                    type: "POST",
                    data: {
                        username : $('#username').val(),
                        password : $('#password').val(),
                        remember : $('#remember').val(),
                    },
                    error:function(data){
                        var errors = data.responseJSON;
                        erContainer.html('<div class="alert alert-danger"></div>');
                        $.each(errors.errors, function(index,value){
                            erContainer.find('.alert.alert-danger').append('<p>'+value+'</p>');
                        });
                        el.text('{{__('Login')}}');
                    },
                    success:function (data){
                        $('.alert.alert-danger').remove();
                        if (data.status == 'seller-login'){
                            el.text('{{__('Redirecting')}}..');
                            erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                            window.location = "{{route('seller.dashboard')}}";
                        }else if (data.status == 'buyer-login'){
                            el.text('{{__('Redirecting')}}..');
                            erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                            window.location = "{{route('buyer.dashboard')}}";
                        }
                        else{
                            erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                            el.text('{{__('Login')}}');
                        }
                    }
                });
            });
           
        });
    </script>
@endsection
