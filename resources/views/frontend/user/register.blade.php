@extends('frontend.frontend-master')
@section('site-title')
    {{ __('User Register') }}
@endsection
@section('content')

@php 
$reg_type = request()->get('type') ?? 'buyer';
@endphp
    <!-- Banner Inner area Starts -->
    <div class="banner-inner-area section-bg-2 padding-top-70 padding-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents text-center">
                        <h2 class="banner-inner-title"> {{ get_static_option('register_page_title') ?? __('Register') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Inner area end -->
    <!-- Register Step Form area starts -->
    <section class="registration-step-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="registration-seller-btn">
                        <ul class="registration-tabs tabs">
                            <li data-tab="tab_one" class="is_user_seller @if($reg_type === 'seller') active @endif">
                                <div class="single-tabs-registration">
                                    <div class="icon">
                                        <i class="las la-briefcase"></i>
                                    </div>
                                    <div class="contents">
                                        <h4 class="title" id="seller"> {{ get_static_option('register_seller_title') ?? __('Seller') }}</h4>
                                    </div>
                                </div>
                            </li>
                            <li data-tab="tab_two" class="@if($reg_type === 'buyer') active @endif is_user_buyer">
                                <div class="single-tabs-registration">
                                    <div class="icon">
                                        <i class="las la-user-alt"></i>
                                    </div>
                                    <div class="contents">
                                        <h4 class="title" id="buyer"> {{ get_static_option('register_buyer_title') ?? __('Client') }}</h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="tab-content active" id="tab_one">
                        <div class="registration-step-form margin-top-55">
                            <form id="msform-one" class="msform user-register-form" method="post"
                                action="{{ route('user.register') }}" enctype="multipart/form-data">
                                @csrf
                                <ul class="registration-list step-list-two">
                                    <li class="list active">
                                        <a class="list-click" href="javascript:void(0)"> 1 </a>
                                    </li>
                                    <li class="list">
                                        <a class="list-click" href="javascript:void(0)"> 2 </a>
                                    </li>
                                    <li class="list">
                                        <a class="list-click" href="javascript:void(0)"> 3 </a>
                                    </li>
                                </ul>
                                <div class="text-center mt-5" id="error-message"></div>
                                <!-- Information -->
                                <fieldset class="fieldset-info user-information">
                                    {{-- validation error show  --}}
                                    <div class="mt-5"> <x-msg.error/> </div>

                                    <div class="information-all margin-top-55">
                                        <div class="info-forms">
                                            <div class="single-forms">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Are you*') }} </label>
                                                    <select name="type" id="user_type" class="from-control">
                                                        <option value="" selected>Select type</option>
                                                        <option value="individual">Individual</option>
                                                        <option value="agency">Agency</option>
                                                        <option value="company">Company</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span id="custom-fields"></span>
                                            <div class="single-forms">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Full Name*') }} </label>
                                                    <input class="form--control" type="text" name="name" id="name"
                                                        placeholder="{{__('Full Name')}}">
                                                </div>
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label">{{ __('User Name*') }} </label>
                                                    <input class="form--control" type="text" value="{{ old('username') }}" name="username"
                                                        id="username" placeholder="{{__('User Name')}}">
                                                </div>
                                            </div>
                                            <div class="single-forms">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Email Address*') }} </label>
                                                    <input class="form--control" value="{{ old('email') }}" type="text" name="email" id="email"
                                                        placeholder="{{__('Type Email')}}">
                                                </div>
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Phone Number*') }} </label>
                                                    <input class="form--control" value="{{ old('phone') }}" type="tel" name="phone" id="phone"
                                                        placeholder="{{__('Type Number')}}">
                                                </div>
                                            </div>
                                            <div class="single-forms">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Password*') }} </label>
                                                    <input class="form--control" type="password" name="password"
                                                        id="password" placeholder="{{__('Type Password')}}">
                                                </div>
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Confirm Password*') }} </label>
                                                    <input class="form--control" type="password"
                                                        name="password_confirmation" id="password_confirmation"
                                                        placeholder="{{__('Retype Password')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="{{__('Next')}}" />
                                </fieldset>
                                <!-- Service -->
                                <fieldset class="fieldset-service service-area">
                                    <div class="information-all margin-top-55">
                                        <h3 class="register-title"> {{ __('Service Area') }} </h3>
                                        <div class="info-service">
                                            <div class="single-info-service margin-top-30">
                                                <div class="single-content">
                                                    <label class="forms-label"> {{ __('Service Country*') }} </label>
                                                    <select name="country" id="country">
                                                        <option value="">{{ __('Select Country') }}</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}" {{ old('country')==$country->id?'selected':'' }}>{{ $country->country }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-info-service margin-top-30">
                                                <div class="single-content">
                                                    <label class="forms-label"> {{ __('Service City*') }} </label>
                                                    <select name="service_city" id="service_city" class="get_service_city">
                                                        <option value="">{{ __('Select City') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-info-service margin-top-30">
                                                <div class="single-content">
                                                    <label class="forms-label"> {{ __('Service Area*') }} </label>
                                                    <select name="service_area" id="service_area" class="get_service_area">
                                                        <option value="">{{ __('Select Area') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="{{__('Next')}}" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="{{__('Previous')}}" />
                                </fieldset>
                                <!-- Terms & Condition -->
                                <fieldset class="fieldset-condition terms-conditions">
                                    <div class="information-all margin-top-55">
                                        <h3 class=""> {{ __('Profile Information') }} </h3>
                                        <div class="single-forms">
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Recognition/Achievements*') }} </label>
                                                    <input class="form--control" type="text" value="{{ old('recognition') }}" name="recognition" id="recognition"
                                                        placeholder="{{__('Recognition/achievements')}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('References*') }} </label>
                                                    <input class="form--control" type="text" value="{{ old('references') }}" name="references" id="references"
                                                        placeholder="{{__('References')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-forms">
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Reference Mobile Number*') }} </label>
                                                    <input class="form--control" value="{{ old('reference_mobile_no') }}" type="text" name="reference_mobile_no" id="reference_mobile_no"
                                                        placeholder="{{__('Reference Mobile Number')}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Education*') }} </label>
                                                    <select name="education" id="education" class="form-control" required>
                                                        <option value="" selected>Select education</option>
                                                        <option value="graduate" {{ old('education')=='graduate'?'selected':'' }}>Graduate</option>
                                                        <option value="post_graduate" {{ old('education')=='post_graduate'?'selected':'' }}>Post-Graduate</option>
                                                        <option value="under_graduate" {{ old('education')=='under_graduate'?'selected':'' }}>Under-Graduate</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-forms">
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Certifications*') }} </label>
                                                    <input class="form--control" type="text" value="{{ old('certifications') }}" name="certifications" id="certifications"
                                                        placeholder="{{__('Certifications')}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Skills*') }} </label>
                                                    <select name="skills" id="skills" class="form-control" required>
                                                        <option value="" selected>Select skills</option>
                                                        <option value="flutter" {{ old('skills')=='flutter'?'selected':'' }}>Flutter</option>
                                                        <option value="react_native" {{ old('skills')=='react_native'?'selected':'' }}>React Native</option>
                                                        <option value="java" {{ old('skills')=='java'?'selected':'' }}>Java</option>
                                                        <option value="python" {{ old('skills')=='python'?'selected':'' }}>Python</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-forms">
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Experience*') }} </label>
                                                    <input class="form--control" value="{{ old('experience') }}" type="number" name="experience" id="experience"
                                                        placeholder="{{__('Year of professional experience')}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Apps Developed*') }} </label>
                                                    <textarea name="apps_developed" id="" cols="30" rows="5" class="form-control" required placeholder="Apps developed">{{ old('apps_developed') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-forms">
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Linkedin Profile Link*') }} </label>
                                                    <input class="form--control" value="{{ old('linked_profile_link') }}" type="text" name="linked_profile_link" id="linked_profile_link"
                                                        placeholder="{{__('Linked profile link')}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Github Profile Link*') }} </label>
                                                    <input class="form--control" value="{{ old('github_profile_link') }}" type="text" name="github_profile_link" id="github_profile_link"
                                                        placeholder="{{__('Github profile link')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-forms">
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Time Availability*') }} </label>
                                                    <select name="time_availability" id="time_availability" class="form-control" required>
                                                        <option value="" selected>Select Time Availability</option>
                                                        <option value="full_time" {{ old('time_availability')=='full_time'?'selected':'' }}>Full Time</option>
                                                        <option value="part_time" {{ old('time_availability')=='part_time'?'selected':'' }}>Part Time</option>
                                                        <option value="hourly_basis" {{ old('time_availability')=='hourly_basis'?'selected':'' }}>Hourly Basis</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('What types of projects do you like to work on?') }} </label>
                                                    <input type="text" name="projects_like_to_work" value="{{ old('projects_like_to_work') }}" required id="projects_like_to_work" class="form-control" placeholder="What types of projects do you like to work on?">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-forms">
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Resume (Upload PDF Attachment)*') }} </label>
                                                    <input class="form--control" type="file" name="resume" id="resume" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> {{ __('Short Bio') }} </label>
                                                    <textarea name="short_bio" id="short_bio" cols="30" required rows="5" class="form-control" placeholder="Enter short bio">{{ old('short_bio') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="condition-info">
                                            <div class="single-condition margin-top-30">
                                                <div class="condition-content">
                                                    <div class="checkbox-inlines">
                                                        <input class="check-input" type="checkbox"
                                                            name="terms_conditions" @if(old('terms_conditions')) checked @endif id="terms_conditions" required>
                                                        <label class="checkbox-label" for="terms_conditions">
                                                            {{ __('I agree with the terms and conditions.') }} </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="get_user_type" id="get_user_type" value="{{$reg_type === 'buyer' ? 1 : 0}}">
                                    <input type="submit" name="submit" class="next action-button" value="{{__('Submit')}}" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="{{__('Previous')}}" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Step Form area end -->

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).on('change', '#user_type', function(){
            var user_type = $(this).val();
            var html = '';
            if(user_type=='individual'){
                html += '<div class="single-forms">'+
                            '<div class="single-content margin-top-30">'+
                                '<label class="forms-label"> {{ __("Date of birth") }} </label>'+
                                '<input type="date" name="date_of_birth" class="form-control">'+
                            '</div>'+
                        '</div>';
            }else{
                html += '<div class="single-forms">'+
                            '<div class="single-content margin-top-30">'+
                                '<label class="forms-label"> {{ __("Registeration Year") }} </label>'+
                                '<input type="text" onkeypress="return isNumberKey(event);" maxlength="4" id="reg_year" name="reg_year" class="form-control">'+
                            '</div>'+
                        '</div>';
            }

            $('#custom-fields').html(html);
        });

        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        (function() {
            "use strict";
            $(document).ready(function() {

               var user_type = "{{$reg_type === 'buyer' ? 1 : 0}}";
                $('#get_user_type').val(user_type);

                $(document).on('click', '.is_user_buyer', function() {
                    $('#get_user_type').val(user_type);
                })
                $(document).on('click', '.is_user_seller', function() {
                    var user_type = 0;
                    $('#get_user_type').val(user_type);
                })

                $('.user-information .next').on('click', function() {
                    var name = $('#name').val();
                    var user_name = $('#user_name').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var password = $('#password').val();
                    var password_confirmation = $('#password_confirmation').val();

                    // validate user information
                    if (name == '' || user_name == '' || email == '' || phone == '' || password == '' ||
                        password_confirmation == '') {
                        //error msg 
                        Command: toastr["warning"]("Please fill all fields!", "Warning")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        return false;
                    }
                    else if (password != password_confirmation) {
                        //error msg 
                        Command: toastr["warning"]("Password and confirm password not match.!",
                            "Warning")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        return false;
                    }
                    else {
                        var current_fs, next_fs, previous_fs;
                        var opacity;
                        var current = 1;
                        var steps = $("fieldset").length;
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $(".step-list li, .step-list-two li").eq($("fieldset").index(next_fs)).addClass(
                            "active");
                        next_fs.show();
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now) {
                                opacity = 1 - now;
                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({
                                    'opacity': opacity
                                });
                            },
                            duration: 500
                        });
                    }
                })

                // change country and get city
                $('#country').on('change', function() {
                    var country_id = $(this).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('user.country.city') }}",
                        data: {
                            country_id: country_id
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                var alloptions = "<option value=''>{{__('Select City')}}</option>";
                                var allCity = res.cities;
                                $.each(allCity, function(index, value) {
                                    alloptions += "<option value='" + value.id +
                                        "'>" + value.service_city + "</option>";
                                });
                                $(".get_service_city").html(alloptions);
                                $('#service_city').niceSelect('update');
                            }
                        }
                    })
                })

                // select city and area
                $('#service_city').on('change', function() {
                    var city_id = $(this).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('user.city.area') }}",
                        data: {
                            city_id: city_id
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                var alloptions = "<option value=''>{{__('Select Area')}}</option>";
                                var allArea = res.areas;
                                $.each(allArea, function(index, value) {
                                    alloptions += "<option value='" + value.id +
                                        "'>" + value.service_area + "</option>";
                                });
                                $(".get_service_area").html(alloptions);
                                $('#service_area').niceSelect('update');
                            }
                        }
                    })
                })

                //confirm service area
                $('.service-area .next').on('click', function() {
                    var service_city = $('#service_city').val();
                    var service_area = $('#service_area').val();
                    var country = $('#country').val();


                    $('.get-all-iformation #get_service_city').text(service_city);
                    $('.get-all-iformation #get_service_area').text(service_area);
                    $('.get-all-iformation #get_country').text(country);

                    if (service_city == '' || service_area == '' || country == '') {
                        //error msg 
                        Command: toastr["warning"]("Please fill all fields!", "Warning")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        return false;
                    }
                    else {
                        var current_fs, next_fs, previous_fs;
                        var opacity;
                        var current = 1;
                        var steps = $("fieldset").length;
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        $(".step-list li, .step-list-two li").eq($("fieldset").index(next_fs)).addClass(
                            "active");

                        next_fs.show();
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now) {
                                opacity = 1 - now;
                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({
                                    'opacity': opacity
                                });
                            },
                            duration: 500
                        });
                    }
                })

                $(document).on('submit', '.user-register-form', function(e) {
                    if (!$('.terms-conditions .check-input').is(":checked")) {
                        //error msg 
                        Command: toastr["warning"]("Please agree with terms and conditions.!",
                            "Warning")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        return false;
                    }
                });

            });
        })(jQuery);
    </script>
@endsection
