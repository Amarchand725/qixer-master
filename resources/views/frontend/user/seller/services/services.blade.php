@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{__('Services')}}
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
                                <h2 class="dashboards-title"> {{__('All Services')}} </h2>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrapper margin-top-50 text-right">
                        <a href="{{route('seller.add.services')}}" class="cmn-btn btn-bg-1"> {{__('Add Services' )}}</a>
                    </div>
                    @if($services->count() > 0)
                    @foreach($services as $data)
                    <div class="dashboard-service-single-item border-1 margin-top-40">
                        <div class="rows dash-single-inner">
                            <div class="dash-left-service">
                                <div class="dashboard-services">
                                    <div class="dashboar-flex-services">
                                        <div class="thumb bg-image" {!! render_background_image_markup_by_attachment_id($data->image,'','thumb') !!}>
                                        </div>
                                        <div class="thumb-contents">
                                            <h4 class="title"> <a href="javascript:void(0)"> {{ $data->title }} </a> </h4>
                                            <span class="service-review"> 
                                                <i class="las la-star"></i>
                                                {{ round(optional($data->reviews)->avg('rating'),1) }} 
                                                <b>({{ optional($data->reviews)->count() }})</b> 
                                            </span>
                                            <span class="service-review style-02"> <i class="las la-eye"></i> {{ $data->view }} </span>
                                            <div class="service-bottom-flex margin-top-30">
                                                <a href="{{ route('seller.pending.orders') }}">
                                                    <div class="dashboard-service-bottom-flex color-1">
                                                        <div class="icon">
                                                            <i class="las la-sync-alt"></i>
                                                        </div>
                                                        <div class="content">
                                                            <span class="num"> {{ optional($data->pendingOrder)->count() }} </span>
                                                            <span class="queue"> {{__('In Queue')}} </span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="dashboard-service-bottom-flex color-2">
                                                    <div class="icon">
                                                        <i class="las la-check"></i>
                                                    </div>
                                                    <div class="content">
                                                        <span class="num"> {{ optional($data->completeOrder)->count() }} </span>
                                                        <span class="queue"> {{__('Completed')}} </span>
                                                    </div>
                                                </div>
                                                <div class="dashboard-service-bottom-flex color-3">
                                                    <div class="icon">
                                                        <i class="las la-times"></i>
                                                    </div>
                                                    <div class="content">
                                                        <span class="num"> {{ optional($data->cancelOrder)->count() }} </span>
                                                        <span class="queue"> {{__('Cancelled')}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash-righ-service">
                                <div class="dashboard-switch-flex-content">
                                    <div class="dashboard-switch-single">
                                        <span class="dashboard-starting"> {{__('Starting From:')}} </span>
                                        <h2 class="title-price color-3"> {{ amount_with_currency_symbol($data->price)}} </h2>
                                    </div>
                                    <div class="dashboard-switch-single">
                                        <span class="dashboard-starting"> {{__('On/Off Service:')}} </span>
                                        @if($data->is_service_on==1)
                                        <input class="custom-switch style-02 service_on_off_btn" id="switch2_{{$data->id}}" type="checkbox" data-id="{{$data->id}}" />
                                        <label class="switch-label style-02" for="switch2_{{$data->id}}"></label>
                                        @else
                                        <input class="custom-switch service_on_off_btn" id="switch1_{{$data->id}}" type="checkbox" data-id="{{$data->id}}" />
                                        <label class="switch-label" for="switch1_{{$data->id}}"></label>
                                        @endif
                                        
                                    </div>
                                    <div class="dashboard-switch-single">
                                        <a href="{{route('seller.edit.services',$data->id)}}"> <span class="dash-icon color-1" data-toggle="tooltip" data-placement="top" title="{{ __('Edit Service') }}"> <i class="las la-pen"></i> </span> </a>
                                        <a href="{{route('seller.services.attributes.add.byid',$data->id)}}"> <span class="dash-icon color-1"  data-toggle="tooltip" data-placement="top" title="{{ __('Add Attributes') }}"> <i class="las la-plus"></i> </span> </a>
                                        <a href="{{route('seller.edit.service.attribute',$data->id)}}"> <span class="dash-icon color-1" data-toggle="tooltip" data-placement="top" title="{{ __('Edit Attributes') }}"> <i class="las la-edit"></i> </span> </a>
                                        <a href="{{route('seller.services.attributes.show.byid',$data->id)}}"> <span class="dash-icon color-1" data-toggle="tooltip" data-placement="top" title="{{ __('Show Attributes') }}"> <i class="las la-eye"></i> </span> </a>
                                        <a href="{{route('service.list.details',$data->slug ?? 'x')}}" target="_blank"> <span class="dash-icon color-1" data-toggle="tooltip" data-placement="top"  title="{{ __('Service in frontend') }}"> <i class="las la-external-link-square-alt"></i> </span> </a>
                                        <x-seller-delete-popup :url="route('seller.services.delete',$data->id)"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="blog-pagination margin-top-55">
                        <div class="custom-pagination mt-4 mt-lg-5">
                            {!! $services->links() !!}
                        </div>
                    </div>
                    @else 
                    <h2 class="no_data_found">{{ __('No Service Created Yet') }}</h2>
                    @endif

                </div>
                
            </div>
        </div>
    </div>
    @endsection  


@section('scripts')
<script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>
    <script>
        (function($){
            "use strict";

            $(document).ready(function(){

                $(document).on('change','.service_on_off_btn',function(e){
                    e.preventDefault();
                    if($(this).is(':checked')){
                        var service_id = $(this).data('id');
                        $.ajax({                                                  
                            method:'post',
                            url:"{{route('seller.services.on.of')}}",
                            data:{service_id:service_id},
                            success:function(res){
                                if(res.status=='success'){
                                    toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "preventDuplicates": true,
                                        "onclick": null,
                                        "showDuration": "100",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "show",
                                        "hideMethod": "hide"
                                    };
                                    toastr.success("{{__('Service On/Of Change Success---')}}");
                                }
                            }
                        });              
                    }else{
                        var service_id = $(this).data('id');
                        $.ajax({                                                  
                            method:'post',
                            url:"{{route('seller.services.on.of')}}",
                            data:{service_id:service_id},
                            success:function(res){
                                if(res.status=='success'){
                                    toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "preventDuplicates": true,
                                        "onclick": null,
                                        "showDuration": "100",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "show",
                                        "hideMethod": "hide"
                                    };
                                    toastr.success("{{__('Service On/Of Change Success---')}}");
                                }
                            }
                        }); 
                    }

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

            });

        })(jQuery);
    </script>
@endsection