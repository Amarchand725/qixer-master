@section('scripts')
<script src="{{asset('assets/common/js/flatpickr.js')}}"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
    <script>
        (function($) {
            "use strict";

            $(document).ready(function() {
                let site_default_currency_symbol = '{{ site_currency_symbol() }}';

                function extra_service_calculate(){
                    let additional_total_price = 0; 
                    let additional_services = $("div.single-additional");

                    for (let i = 0; i < additional_services.length; i++) {
                        let service_data = $(additional_services[i]).find('.inc_dec_additional_service');
                        let service_count = service_data.find($('.room-count')).text();
                        let unit_price = service_data.find($('.value-count')).text().replace(site_default_currency_symbol, '');

                        additional_total_price += (service_count * unit_price);
                    }
                    $('.extra-service-fee').text(site_default_currency_symbol+additional_total_price);
                }

                function subtotal_calculate(){
                    let package_fee = parseInt($('.package-fee').text().replace(',','').replace(site_default_currency_symbol,''));
                    console.log(package_fee);
                    let extra_service_fee = parseInt($('.extra-service-fee').text().replace(',','').replace(site_default_currency_symbol,''));
                    let service_subtotal = package_fee+extra_service_fee;
                    $('.service-subtotal').text(site_default_currency_symbol+service_subtotal);
                }
                subtotal_calculate();

                function total_amount(){
                    tax_calculate()
                    let subtotal = parseFloat($('.service-subtotal').text().replace(',','').replace(site_default_currency_symbol,''));
                    let tax = parseFloat($('.tax-amount').text().replace(',','').replace(site_default_currency_symbol,''));
                    let total_amount = subtotal+tax;
                    
                    $('.total-amount').text(site_default_currency_symbol+total_amount);
                }
                total_amount()

                function tax_calculate(){
                    let subtotal = parseInt($('.service-subtotal').text().replace(',','').replace(site_default_currency_symbol,''));
                    let service_tax = parseInt($('.service-tax').text());
                    if(service_tax >0){
                        let tax_amount = (subtotal * service_tax)/100;
                        $('.tax-amount').text(site_default_currency_symbol+tax_amount);
                    }else{
                        let tax_amount = 0;
                        $('.tax-amount').text(site_default_currency_symbol+tax_amount);
                    }
                }
                 
                //location
                $('#choose_service_area').on('change', function() {
                    let area_text = $("#choose_service_area :selected").text();
                    $('.area_name_text').text(area_text);
                })

                //confirm-location
                $('.confirm-location .next').on('click', function() {

                    let area_name = $('#choose_service_area').val();
                    let city_text = $('#choose_service_city').text();
                    let country_text = $('#choose_service_country').text();

                    $('.city_name_text').text(city_text);
                    $('.country_name_text').text(country_text);

                    if(area_name=='' ){
                        Command: toastr["warning"]("{{__('Please select your area !')}}", "Aviso")
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
                    }else{
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

                //location end 

                //Service start
                $(document).on('click', '.remove-service-list', function() {
                    let include_service_id = $(this).data('id');
                    $('.include_service_id_' + include_service_id).remove();

                    var include_total_price = 0;
                    var quantity = Number($(this).val());

                    $('#include_service_quantity_2_' + include_service_id).text(quantity);
                    $('#include_service_quantity_3_' + include_service_id).text(quantity);

                    if (isNaN(quantity)) {
                        alert('Please Enter Numbers Only');
                    } else {
                        let included_services = $("div.single-include");

                        for (let i = 0; i < included_services.length; i++) {
                            let service_data = $(included_services[i]).find('.inc_dec_include_service');
                            let service_count = Number(service_data.val());
                            let service_total_price = Number(service_data.data('price'));
                            include_total_price += (service_count * service_total_price);
                        }
                        
                        $('.package-fee').text(site_default_currency_symbol+include_total_price);
                        subtotal_calculate();
                        total_amount();
                    }

                })


                //Increment Decrement include service
                $(document).on('keyup click', '.inc_dec_include_service', function() {
                    var include_total_price = 0;
                    let include_service_id = $(this).data('id');
                    var quantity = Number($(this).val());

                    $('#include_service_quantity_2_' + include_service_id).text(quantity);
                    $('#include_service_quantity_3_' + include_service_id).text(quantity);

                    if (isNaN(quantity)) {
                        alert('Please Enter Numbers Only');
                    } else {
                        let included_services = $("div.single-include");

                        for (let i = 0; i < included_services.length; i++) {
                            let service_data = $(included_services[i]).find('.inc_dec_include_service');
                            let service_count = Number(service_data.val());
                            let service_total_price = Number(service_data.data('price'));
                            include_total_price += (service_count * service_total_price);
                        }
                        
                        $('.package-fee').text(site_default_currency_symbol+include_total_price);
                        subtotal_calculate();
                        total_amount();
                    }
                })

                //Upgrade order with extras
                $(document).on('click','.extra-services .check-input',function(){
                    
                    let additional_service_id = $(this).val();
                    let service_name = $('label[for=' + additional_service_id + ']').text();
                    let unit_price = $('span[price=' + additional_service_id + ']').text().replace(site_default_currency_symbol, '');
                    let quantity = $('#additional_service_quantity_'+additional_service_id).val();

                    if($(this).is(":checked")) {
                        $('.extra-service-list').append('<div class="single-additional">\
                            <li class="list inc_dec_additional_service" id="additional_service_id_'+additional_service_id+'">\
                                <span class="rooms">'+ service_name +'</span>\
                                <span class="room-count service_quantity_count">'+quantity+'</span>\
                                <span class="value-count">'+site_default_currency_symbol+unit_price+ '</span>\
                            </li>\
                        </div>');

                        $('.extra-service-list-2').append('<div class="single-additional-2">\
                            <li class="list inc_dec_additional_service additional_service_list" id="additional_service_id_2_'+additional_service_id+'">\
                                <input type="hidden" class="additionalServiceID" value="'+additional_service_id+'">\
                                <span class="rooms">'+ service_name +'</span>\
                                <span class="room-count additional_service_quantity service_quantity_count">'+quantity+'</span>\
                                <span class="value-count">'+site_default_currency_symbol+unit_price+ '</span>\
                            </li>\
                        </div>');  
                        extra_service_calculate();
                        subtotal_calculate();
                        total_amount();
                        tax_calculate()
                    }else{
                        $(".single-additional #additional_service_id_"+additional_service_id).remove();
                        $(".single-additional-2 #additional_service_id_2_"+additional_service_id).remove();
                         extra_service_calculate();
                         subtotal_calculate();
                         total_amount();                    
                    }  
                })

                $(document).on('keyup click', '.inc_dec_additional_service', function() {
                    let additional_service_id = $(this).data('id');
                    var quantity = Number($(this).val());

                    $('.single-additional #additional_service_id_'+additional_service_id+' .room-count').text(quantity);
                    $('.single-additional-2 #additional_service_id_2_'+additional_service_id+' .room-count').text(quantity);

                    if (isNaN(quantity)) {
                        alert('Por favor insira apenas números');
                    } else {
                        extra_service_calculate(); 
                        subtotal_calculate();
                        total_amount();
                        tax_calculate()
                    }
                })

                //confirm-service
                $('.confirm-service .next').on('click', function() {
                    $('.flatpickr-day.today').trigger('click');
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
                })

                //Service end

                //Date and time
                $("#service_available_dates").flatpickr({
                    minDate: "today",
                    maxDate: new Date().fp_incr({{ $days_count }}),
                    inline: true,
                    altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d",
                    locale: "pt"
                });


                //find schedule for a day
                $(".schedule_loader").hide();
                    var date_string_format='';
                    $(document).on('change','#service_available_dates',function(){
                    let date_string = $(this).val();
                    
                    let day_date = new Date($(this).val());
                    date_string_format = day_date.toDateString();
                    // date_string_format = day_date.toLocaleString();
                    
                    let day = date_string_format.split(' ')[0];
                    let seller_id = $('.seller-id-for-schedule').text();


                    //set value in confirmation fieldset
                    // $('.confirm-overview-left .available_date').text(date_string_format);  
                    $('.confirm-overview-left .available_date').text(date_string);  

                    $.ajax({
                        url:"{{ route('service.schedule.by.day') }}",
                        method:'post',
                        data:{
                            day:day,
                            date_string:date_string,
                            seller_id:seller_id
                            
                        },
                        beforeSend: function() {
                            $(".schedule_loader").show();
                        },
                        success:function(res){
                            if(res.status=='success'){
                                let all_lists = '';
                                let all_schedules = res.schedules;
                                $.each(all_schedules, function(index, value) {
                                    all_lists += '<li class="list"><a href="javascript:void(0)" class="get-schedule">'+value.schedule+'</a></li>';
                                });
                                $(".show-schedule").html(all_lists);
                                $(".schedule_loader").hide();
                            }if(res.status=='no schedule'){
                                $(".show-schedule").html('<div class="alert alert-warning mt-3"><li class="list">{{ __("Schedule not available") }}</li></div>');
                                $(".schedule_loader").hide();
                            }
                        }
                    })
                })

                //get available schedule
                var available_schedule ='';
                $(document).on('click','.get-schedule',function(){
                    available_schedule = $(this).text();
                    //set value in confirmation fieldset
                    $('.confirm-overview-left .available_schedule').text(available_schedule);
                })

                //confirm-date-time
                $('.confirm-date-time .next').on('click',function(){
                    if(date_string_format=='' || available_schedule==''){
                        Command: toastr["warning"]("{{__('Please select date and schedule.!')}}", "Aviso")
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
                    }else{
                        var current_fs, next_fs, previous_fs;
                        var opacity;
                        var current = 1;
                        var steps = $("fieldset").length;
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        $(".step-list li, .step-list-two li").eq($("fieldset").index(next_fs)).addClass("active");

                        next_fs.show();
                        current_fs.animate({ opacity: 0 }, {
                            step: function(now) {
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({ 'opacity': opacity });
                            },
                            duration: 500
                        });
                    }  
                })

                //confirm-information
                $('.confirm-information .next').on('click',function(){
                    let name =  $('#name').val();
                    let email = $('#email').val();
                    let phone = $('#phone').val();
                    let post_code = $('#post_code').val();
                    let address =   $('#address').val();
                    let order_note = $('#order_note').val();
                    
                    //set value in confirmation fieldset
                    $('.booking-details .get_name').text(name);
                    $('.booking-details .get_email').text(email);
                    $('.booking-details .get_phone').text(phone);
                    $('.booking-details .get_post_code').text(post_code);
                    $('.booking-details .get_address').text(address);
                    $('.booking-details .get_order_note').text(order_note);
                    if(name=='' || email=='' || phone=='' || post_code=='' || address==''){
                        Command: toastr["warning"]("{{__('Please fill all fields.!')}}", "Aviso")
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
                    }else{
                        var current_fs, next_fs, previous_fs;
                        var opacity;
                        var current = 1;
                        var steps = $("fieldset").length;
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        $(".step-list li, .step-list-two li").eq($("fieldset").index(next_fs)).addClass("active");

                        next_fs.show();
                        current_fs.animate({ opacity: 0 }, {
                            step: function(now) {
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({ 'opacity': opacity });
                            },
                            duration: 500
                        });
                    }  
                })

                //Order Confirm
                $(document).on('submit','.ms-order-form',function(e){

                    if(!$('.terms-and-conditions .check-input').is(":checked")){
                        //error msg 
                        Command: toastr["warning"]("{{__('Please agree with terms and conditions.!')}}", "Aviso")
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
                    if($('input[name="selected_payment_gateway"]').val() == ''){
                        //error msg 
                        Command: toastr["warning"]("{{__('Please select payment gateway.!')}}", "Aviso")
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

                    let formContainer = $('#msform');

                    let available_date = $('.available_date').text();
                    formContainer.find('input[name=date]').val(available_date);
                    let available_schedule = $('.available_schedule').text();
                    formContainer.find('input[name=schedule]').val(available_schedule);
                    let coupon_code = $('.coupon_code').val();
                    formContainer.find('input[name=coupon_code]').val(coupon_code);

                    let services = [];
                    let included_services = $("li.include_service_list");
                    
                    for (let i = 0; i < included_services.length; i++) {
                        let include_service_quantity = $(included_services[i]).find('.include_service_quantity').text();
                        let include_service_id = $(included_services[i]).find('.includeServiceID').val();
                        services.push({
                            id: include_service_id,
                            quantity: include_service_quantity
                        })
                        $('#msform').append('<input type="hidden" name="services['+i+'][id]" value="'+include_service_id+'"/>');
                        $('#msform').append('<input type="hidden" name="services['+i+'][quantity]" value="'+include_service_quantity+'"/>');
                    }
                    
                    let additionals = [];
                    let additional_services = $("li.additional_service_list");

                    for (let i = 0; i < additional_services.length; i++) {
                        let additional_service_quantity = $(additional_services[i]).find('.additional_service_quantity').text();
                        let additional_service_id = $(additional_services[i]).find('.additionalServiceID').val();
                        additionals.push({
                            id: additional_service_id,
                            quantity: additional_service_quantity
                        })
                        $('#msform').append('<input type="hidden" name="additionals['+i+'][id]" value="'+additional_service_id+'"/>');
                        $('#msform').append('<input type="hidden" name="additionals['+i+'][quantity]" value="'+additional_service_quantity+'"/>');
                    }

                });
                
                //apply coupon code
                $(document).on('click','.apply-coupon',function(e){
                    e.preventDefault();
                    let total_amount = $('.total_amount_for_coupon').text().replace(',','').replace(site_default_currency_symbol,'');
                    let coupon_code = $('.coupon_code').val();
                    let seller_id = $('#seller_id').val();

                    $.ajax({
                            url:"{{ route('service.coupon.apply') }}",
                            method:"get",
                            data:{
                                coupon_code:coupon_code,
                                total_amount:total_amount,
                                seller_id:seller_id, 
                            },
                            success:function(res){
                                if (res.status == 'success') {
                                    let coupon_amount = res.coupon_amount;
                                    let new_total = (total_amount-coupon_amount)*1;
                                    $('#total_amount_for_coupon').text(site_default_currency_symbol+new_total.toFixed(2));
                                    $('.coupon_input_field').hide();
                                    $('.coupon_amount_for_apply_code').html('<strong>{{__("Coupon Discount")}}</strong>' + site_default_currency_symbol+coupon_amount.toFixed(2))
                                }
                                if (res.status == 'invalid') {
                                    Command: toastr["warning"]("{{__('Coupon is invalid.!')}}", "Aviso")
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
                                if (res.status == 'expired') {
                                    Command: toastr["warning"]("{{__('Coupon already expired.!')}}", "Aviso")
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
                                if (res.status == 'notapplicable') {
                                    Command: toastr["warning"]("{{__('Coupon is not applicable for this service.!')}}", "Aviso")
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
                                if (res.status == 'emptycoupon') {
                                    Command: toastr["warning"]("{{__('Please enter your coupon.!')}}", "Aviso")
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
                                
                                
                            }
                    });
                })

                //select payment gateway 
                $(document).on('click', '.payment_getway_image ul li',function(){
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');
                    let payment_gateway_name = $(this).data('gateway');
                    $('#msform input[name=selected_payment_gateway]').val(payment_gateway_name);

                    $('.manual_payment_transaction_field').hide();
                    if (payment_gateway_name == 'manual_payment') {
                        $('.manual_payment_transaction_field').show();
                    } 
                    $(this).addClass('selected').siblings().removeClass('selected');
                    $('.payment-gateway-wrapper').find(('input')).val(payment_gateway_name);
                });
                
                $('.payment_getway_image ul li.selected.active').trigger('click');
                

            });
        })(jQuery);
    </script>
@endsection