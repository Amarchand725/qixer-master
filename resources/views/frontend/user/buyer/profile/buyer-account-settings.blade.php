@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{__('Buyer Account Settings')}}
@endsection
@section('content')
   
    <x-frontend.seller-buyer-preloader/>

    <!-- Dashboard area Starts -->
    <div class="body-overlay"></div>
    <div class="dashboard-area dashboard-padding">
        <div class="container-fluid">
            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                @include('frontend.user.buyer.partials.sidebar')
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> {{__('Account Settings')}} </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 margin-top-50">
                            <x-error-message/>
                            <form action="{{route('seller.account.settings')}}" method="post">
                                @csrf
                                <div class="single-settings">
                                    <h4 class="input-title"> {{__('Change Password')}} </h4>
                                    <div class="single-dashboard-input">
                                        <div class="single-info-input margin-top-30">
                                            <label class="info-title"> {{__('Current Password*')}} </label>
                                            <input class="form--control" type="password" name="current_password" id="current_password" placeholder="{{__('Current Password')}}">
                                        </div>
                                    </div>
                                    <div class="single-dashboard-input">
                                        <div class="single-info-input margin-top-30">
                                            <label class="info-title"> {{__('New Password*')}} </label>
                                            <input class="form--control" type="password" name="new_password" id="new_password" placeholder="{{__('New Password')}}">
                                        </div>
                                    </div>
                                    <div class="single-dashboard-input">
                                        <div class="single-info-input margin-top-30">
                                            <label class="info-title"> {{__('Re-Type Password*')}} </label>
                                            <input class="form--control" type="password" name="confirm_password" id="confirm_password" placeholder="{{__('Retype Password')}}">
                                        </div>
                                    </div>
                                    <div class="btn-wrapper margin-top-40">
                                        <button class="cmn-button btn-bg-1" type="submit"> {{__('Update Password')}} </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard area end -->
    @endsection   