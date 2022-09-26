@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{__('Service Coupons')}}
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('assets/common/css/flatpickr.min.css')}}">
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
                @include('frontend.user.seller.partials.sidebar')
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> {{__('All Coupons')}} </h2>
                                <small class="text-danger">{{ __('Coupon will applicable only for your services and coupon amount will be reduce from your earnings.') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrapper margin-top-50 text-right">
                        <button class="cmn-btn btn-bg-1" data-toggle="modal" data-target="#addCouponModal">{{ __('Add Coupon') }}</button>
                    </div>
                    
                    <div class="mt-5"> <x-msg.error/> </div>
                    <div class="dashboard-service-single-item border-1 margin-top-40">
                        <div class="rows dash-single-inner">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('No') }}</th>
                                        <th>{{ __('Code') }}</th>
                                        <th>{{ __('Discount') }}</th>
                                        <th>{{ __('Discount Type') }}</th>
                                        <th>{{ __('Expire Date') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->code }}</td>
                                        <td>{{ $data->discount }}</td>
                                        <td>{{ __($data->discount_type) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->expire_date)->format('d/m/Y') }}</td>
                                        <td>
                                            @if($data->status==1) 
                                            <span class="text-success">{{ __('Active') }}</span>
                                            @else 
                                            <span class="text-danger">{{ __('Inactive') }}</span>
                                            @endif 
                                            <x-seller-coupon-status :url="route('seller.service.coupon.status',$data->id)"/>
                                        </td>
                                        <td>
                                            <div class="dashboard-switch-single">
                                            <a href="#0" class="edit_coupon_modal" 
                                            data-toggle="modal" 
                                            data-target="#editCouponModal"
                                            data-id="{{ $data->id }}"
                                            data-code="{{ $data->code }}"
                                            data-discount="{{ $data->discount }}"
                                            data-discount_type="{{ __($data->discount_type) }}"
                                            data-expire_date="{{ $data->expire_date }}"
                                            >
                                            <span style="font-size:16px;" class="dash-icon color-1"> <i class="las la-edit"></i> </span>
                                            </a>
                                            <x-seller-delete-popup :url="route('seller.service.coupon.delete',$data->id)"/>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Add Modal -->
    <div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="couponModal" aria-hidden="true">
        <form action="{{ route('seller.service.coupon.add') }}" method="post">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header d-block ">
                        <h5 class="modal-title" id="couponModal">{{ __('Add New Coupon') }}</h5>
                        <small class="text-info">{{ __('Be careful while create a coupon. if the service price less than the admin charge after apply coupon than admin charge will cut from your main balance.') }}</small>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group mt-3">
                            <label for="code">{{ __('Coupon Code') }}</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="{{ __('Coupon Code') }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="discount">{{ __('Coupon Discount') }}</label>
                            <input type="number" name="discount" id="discount" class="form-control" placeholder="{{ __('Discount') }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="discount_type">{{ __('Coupon Type') }}</label>
                            <select name="discount_type" id="discount_type" class="form-control mb-3">
                                <option value="">{{ __('Select Type') }}</option>
                                <option value="percentage">{{ __('Percentage') }}</option>
                                <option value="amount">{{ __('Amount') }}</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="expire_date">{{ __('Expire Date') }}</label>
                            <input type="date" name="expire_date" id="expire_date" class="form-control" placeholder="{{ __('Expire Date') }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    
    <!-- Edit Modal -->
    <div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="editCouponModal" aria-hidden="true">
        <form action="{{ route('seller.service.coupon.update') }}" method="post">
            <input type="hidden" id="up_id" name="up_id" >
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCouponModal">{{ __('Edit Coupon') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group mt-3">
                            <label for="up_code">{{ __('Coupon Code') }}</label>
                            <input type="text" name="up_code" id="up_code" class="form-control" placeholder="{{ __('Coupon Code') }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="up_discount">{{ __('Coupon Discount') }}</label>
                            <input type="number" name="up_discount" id="up_discount" class="form-control" placeholder="{{ __('Discount') }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="up_discount_type">{{ __('Coupon Type') }}</label>
                            <select name="up_discount_type" id="up_discount_type" class="form-control nice-select mb-3">
                                <option value="">{{ __('Select Type') }}</option>
                                <option value="percentage">{{ __('Percentage') }}</option>
                                <option value="amount">{{ __('Amount') }}</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="up_expire_date">{{ __('Expire Date') }}</label>
                            <input type="date" name="up_expire_date" id="up_expire_date" class="form-control" placeholder="{{ __('Expire Date') }}">
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection  


@section('scripts')
<script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>
<script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
<script src="{{asset('assets/common/js/flatpickr.js')}}"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){

                $(document).on('click','.edit_coupon_modal',function(e){
                    e.preventDefault();
                    let coupon_id = $(this).data('id');
                    let code = $(this).data('code');
                    let discount = $(this).data('discount');
                    let discount_type = $(this).data('discount_type');
                    let expire_date = $(this).data('expire_date');

                    $('#up_id').val(coupon_id);
                    $('#up_code').val(code);
                    $('#up_discount').val(discount);
                    $('#up_discount_type').val(discount_type);
                    $('#up_expire_date').val(expire_date);
                    $('.nice-select').niceSelect('update');
                });

                $(document).on('click','.swal_status_button',function(e){
                    e.preventDefault();
                        Swal.fire({
                        title: '{{__("Are you sure to change status?")}}',
                        text: '{{__("You will change it anytime!")}}',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "{{__('Yes, delete it!')}}"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).next().find('.swal_form_submit_btn').trigger('click');
                        }
                        });
                    });


                $(document).on('click','.swal_delete_button',function(e){
                    e.preventDefault();
                        Swal.fire({
                        title: '{{__("Are you sure?")}}',
                        text: '{{__("You would not be able to revert this item!")}}',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "{{__('Yes, delete it!')}}"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).next().find('.swal_form_submit_btn').trigger('click');
                        }
                    });
                });

                $("#expire_date").flatpickr({
                    dateFormat: "Y-m-d",
                });
                $("#up_expire_date").flatpickr({
                    dateFormat: "Y-m-d",
                });

            });
            
        })(jQuery);
    </script>
@endsection