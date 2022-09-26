@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{__('Add Service Attributes')}}
@endsection

@section('style')
    <x-media.css/>
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
                        <div class="col-lg-6">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> {{__('Add Service Attributes')}} </h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard-switch-single">
                                <input class="custom-switch is_service_online" id="is_service_online" type="checkbox"/>{{__('Is Service Online:')}}
                                <label class="switch-label" for="is_service_online"></label>
                            </div>
                        </div>
                    </div>
                    <x-error-message/>
                    <form action="{{route('seller.services.attributes.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="service_id" value="{{$latest_service->id}} ">
                        <input type="hidden" name="is_service_online_id"  id="is_service_online_id">

                    <div class="row">
                        <div class="col-xl-4 margin-top-50">
                            <div class="edit-service-wrappers">
                                <div class="dashboard-edit-thumbs">
                                    {!! render_image_markup_by_attachment_id($latest_service->image) !!}
                                </div>
                                <div class="content-edit margin-top-40">
                                    <h4 class="title"> {{$latest_service->title}} </h4>
                                    <p class="edit-para"> {{ Str::limit(strip_tags($latest_service->description)),200 }} </p>
                                </div>
                                <div class="single-dashboard-input service-price-show-hide">
                                    <div class="single-info-input margin-top-50">
                                        <label class="info-title"> {{__('Service Price')}}</label>
                                        <input class="form--control" type="text" name="price" id="service_total_price" disabled>
                                    </div>
                                </div>

                                <div class="btn-wrapper margin-top-40">
                                    <button type="submit" class="cmn-btn btn-bg-1">{{__('Save & Publish')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 margin-top-50">
                            <div class="single-settings">
                                <h4 class="input-title"> {{__('Whats Included This Package')}} </h4>
                                    <div class="append-additional-includes">
                                        <div class="single-dashboard-input what-include-element">
                                            <div class="single-info-input margin-top-20">
                                                <label>{{ __('Title') }}</label>
                                                <input class="form--control" type="text" name="include_service_title[]" placeholder="{{__('Service tilte')}}">
                                            </div>
                                            <div class="single-info-input margin-top-20 is_service_online_hide">
                                                <label>{{ __('Unit Price') }}</label>
                                                <input class="form--control include-price" type="number" step="0.01" name="include_service_price[]" placeholder="{{__('Add Price')}}">
                                            </div>
                                            <div class="single-info-input margin-top-20 is_service_online_hide">
                                                <label>{{ __('Quantity') }}</label>
                                                <input class="form--control numeric-value" type="text" name="include_service_quantity[]" value="1" placeholder="{{__('Add Quantity')}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper margin-top-20">
                                        <a href="javascript:void(0)" class="btn-see-more style-02 color-3 add-what-includes"> {{__('Add More')}} </a>
                                    </div>
                            </div>
                            <div class="single-settings day_review_show_hide">
                                <div class="single-dashboard-input">
                                    <div class="single-info-input margin-top-20">
                                        <label>{{ __('Delivery Days') }}</label>
                                        <input class="form--control" type="number" step="0.01" name="delivery_days" placeholder="{{__('Delivery Days')}}">
                                    </div>
                                    <div class="single-info-input margin-top-20">
                                        <label>{{ __('Revisions') }}</label>
                                        <input class="form--control" type="number" step="0.01" name="revision" placeholder="{{__('Revision Times')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="single-settings online_service_price_show_hide">
                                <div class="single-dashboard-input">
                                    <div class="single-info-input margin-top-20">
                                        <label>{{ __('Service Price') }}</label>
                                        <input class="form--control" type="number" step="0.01" name="online_service_price" placeholder="{{__('Service price')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="single-settings margin-top-40">
                                <h4 class="input-title"> {{__('Add Aditional Services')}} </h4>
                                    
                                    <div class="append-additional-services">
                                        <div class="single-dashboard-input additional-services">
                                            <div class="single-info-input margin-top-20">
                                                <label>{{ __('Title') }}</label>
                                                <input class="form--control" type="text" name="additional_service_title[]" placeholder="{{__('Service tilte')}}">
                                            </div>
                                            <div class="single-info-input margin-top-20">
                                                <label>{{ __('Unit Price') }}</label>
                                                <input class="form--control numeric-value" type="number" step="0.01" name="additional_service_price[]" placeholder="{{__('Add Price')}}">
                                            </div>
                                            <div class="single-info-input margin-top-20">
                                                <label>{{ __('Quantity') }}</label>
                                                <input class="form--control numeric-value" type="text" name="additional_service_quantity[]" value="1" placeholder="{{__('Add Quantity')}}" readonly>
                                            </div>

                                            <div class="single-info-input margin-top-30">
                                                <div class="form-group ">
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap"></div>
                                                        <input type="hidden" name="image[]">
                                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="{{__('Select Image')}}"
                                                                data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                                data-target="#media_upload_modal">
                                                            {{__('Upload Image')}}
                                                        </button>
                                                        <small>{{ __('image format: jpg,jpeg,png')}}</small> <br>
                                                        <small>{{ __('recomended size 78x78') }}</small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="btn-wrapper margin-top-20">
                                        <a href="javascript:void(0)" class="btn-see-more style-02 color-3 add-additional-services"> {{__('Add More')}} </a>
                                    </div>
                            </div>
                            <div class="single-settings margin-top-40">
                                <h4 class="input-title"> {{__('Benifit Of This Package')}} </h4>
                                    <div class="append-benifits">
                                        <div class="single-dashboard-input benifits">
                                            <div class="single-info-input margin-top-20">
                                                <input class="form--control" type="text" name="benifits[]" placeholder="{{__('Type Here')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper margin-top-20">
                                        <a href="javascript:void(0)" class="btn-see-more style-02 color-3 add-benifits"> {{__('Add More')}} </a>
                                    </div>
                            </div>
                            <div class="single-settings margin-top-40 faq_show_hide">
                                <h4 class="input-title"> {{__('Faqs')}} </h4>
                                <div class="append-faqs">
                                    <div class="single-dashboard-input faqs">
                                        <div class="single-info-input margin-top-20">
                                            <input class="form--control" type="text" name="faqs_title[]" placeholder="{{__('Faq Title')}}">
                                        </div>
                                        <div class="single-info-input margin-top-20">
                                            <textarea class="form--control" name="faqs_description[]" cols="20" rows="5" placeholder="{{__('Faq Descriptiom')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper margin-top-20">
                                    <a href="javascript:void(0)" class="btn-see-more style-02 color-3 add-faqs"> {{__('Add More')}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <x-media.markup :type="'web'"/>
    <!-- Dashboard area end -->
@endsection  

@section('scripts')

<x-media.js :type="'web'"/>

 <script>
    (function ($) {
        'use strict'
        $(document).ready(function() {
            // add what new inclue
             $(".add-what-includes").on('click',function(){
                 let  total_element = $(".what-include-element").length;
                 let max = 15;
                if(total_element < max ){
                  $(".append-additional-includes").append(
                        '<div class="single-dashboard-input what-include-element">\
                            <div class="single-info-input margin-top-20">\
                                <label>{{ __('Title') }}</label>\
                                <input class="form--control" type="text" name="include_service_title[]" placeholder="{{__('Service tilte')}}">\
                            </div>\
                            <div class="single-info-input margin-top-20 is_service_online_hide">\
                                <label>{{ __('Unit Price') }}</label>\
                                <input class="form--control include-price" type="text" name="include_service_price[]" placeholder="{{__('Add Price')}}">\
                            </div>\
                            <div class="single-info-input margin-top-20 is_service_online_hide">\
                                <label>{{ __('Quantity') }}</label>\
                                <input class="form--control numeric-value" name="include_service_quantity[]" value="1" type="text" placeholder="{{__('Add Quantity')}}" readonly>\
                            </div><span class="btn btn-danger remove-include"><i class="las la-times"></i></span>\
                        </div>'
                    );
                }
                 if ($("#is_service_online").is(':checked')){
                     $('.is_service_online_hide').hide();
                 }
             }) 

             // remove include service
            $(document).on('click', ".remove-include", function() {
                $(this).closest('.what-include-element').remove();
            })  

             // add additional service
             $(".add-additional-services").on('click',function(){
                 let  total_element = $(".additional-services").length;
                 let max = 5;
                 if(total_element < max ){
                  $(".append-additional-services").append(
                      '<div class="single-dashboard-input additional-services">\
                            <div class="single-info-input margin-top-20">\
                                <label>{{ __('Title') }}</label>\
                               <input class="form--control" type="text" name="additional_service_title[]" placeholder="{{__('Service tilte')}}">\
                            </div>\
                            <div class="single-info-input margin-top-20">\
                                <label>{{ __('Unit Price') }}</label>\
                                <input class="form--control numeric-value" type="text" name="additional_service_price[]" placeholder="{{__('Add Price')}}">\
                            </div>\
                            <div class="single-info-input margin-top-20">\
                                <label>{{ __('Quantity') }}</label>\
                                <input class="form--control numeric-value" type="text" name="additional_service_quantity[]" value="1" placeholder="{{__('Add Quantity')}}" readonly>\
                            </div>\
                            <div class="single-info-input margin-top-30">\
                                <div class="form-group ">\
                                    <div class="media-upload-btn-wrapper">\
                                        <div class="img-wrap"></div>\
                                        <input type="hidden" name="image[]">\
                                        <button type="button" class="btn btn-info media_upload_form_btn"\
                                                data-btntitle="{{__('Select Image')}}"\
                                                data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"\
                                                data-target="#media_upload_modal">\
                                            {{__('Upload Image')}}\
                                        </button>\
                                    </div>\
                                </div>\
                            </div>\<span class="btn btn-danger remove-service"><i class="las la-times"></i></span>\
                      </div>');
                 } 
             })

            // remove additional service
            $(document).on('click', ".remove-service", function() {
                $(this).closest('.additional-services').remove();
            })   

              // add benifits
             $(".add-benifits").on('click',function(){
                 let  total_element = $(".benifits").length;
                 let max = 5;
                 if(total_element < max ){
                  $(".append-benifits").append(
                      '<div class="single-dashboard-input benifits faq_show_hide">\
                        <div class="single-info-input margin-top-20">\
                           <input class="form--control" type="text" name="benifits[]" placeholder="{{__('Type Here')}}">\
                        </div><span class="btn btn-danger remove-benifits"><i class="las la-times"></i></span>\
                      </div>');
                 } 
             }) 

            // remove benifits
            $(document).on('click', ".remove-benifits", function() {
                $(this).closest('.benifits').remove();
            })

            // add faqs
            $(".add-faqs").on('click',function(){
                let  total_element = $(".faqs").length;
                let max = 15;
                if(total_element < max ){
                    $(".append-faqs").append(
                        '<div class="single-dashboard-input faqs">\
                        <div class="single-info-input margin-top-20">\
                        <input class="form--control" type="text" name="faqs_title[]" placeholder="{{__('Faq Title')}}">\
                        </div>\
                        <div class="single-info-input margin-top-20">\
                        <textarea class="form--control" name="faqs_description[]" cols="20" rows="5" placeholder="{{__('Faq Descriptiom')}}"></textarea>\
                    </div><span class="btn btn-danger remove-faqs"><i class="las la-times"></i></span>\
                </div>');
                }
            })

            // remove faqs
            $(document).on('click', ".remove-faqs", function() {
                $(this).closest('.faqs').remove();
            })

            //total price
            $(document).on("change", ".include-price", function() {
                var sum = 0;
                $(".include-price").each(function() {
                    if(isNaN($(this).val())){
                       alert('Please Enter Numeric Value only')  
                    }else{
                        sum += +$(this).val();
                    }
                });
                $("#service_total_price").val(sum);
            }); 

           //include quantity
           $(document).on("change", ".numeric-value", function() {
                if(isNaN($(this).val())){
                    alert('Please Enter Numeric Value only')  
                }
            });


           // is service online
            $('.day_review_show_hide').hide()
            $('.faq_show_hide').hide()
            $('.online_service_price_show_hide').hide()

            $("#is_service_online").on('change', function() {
                if ($("#is_service_online").is(':checked')){
                    $('.is_service_online_hide').hide();
                    $('#is_service_online_id').val(1)
                    $('.day_review_show_hide').show()
                    $('.faq_show_hide').show()
                    $('.service-price-show-hide').hide()
                    $('.online_service_price_show_hide').show()
                }else {
                    $('.is_service_online_hide').show();
                    $('#is_service_online_id').val('')
                    $('.day_review_show_hide').hide()
                    $('.faq_show_hide').hide()
                    $('.service-price-show-hide').hide()
                    $('.online_service_price_show_hide').hide()
                }
            });

        })
    })(jQuery)
 </script>
@endsection