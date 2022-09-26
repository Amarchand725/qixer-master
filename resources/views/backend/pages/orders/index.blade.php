@extends('backend.admin-master')
@section('site-title')
    {{__('All Orders')}}
@endsection

@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title">{{__('All Orders')}}  </h4>
                            </div>
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Buyer Name')}}</th>
                                <th>{{__('Buyer Email')}}</th>
                                <th>{{__('Buyer Phone')}}</th>
                                <th>{{__('Buyer Address')}}</th>
                                <th>{{__('Total Amount')}}</th>
                                <th>{{__('Payment Status')}}</th>
                                <th>{{__('Order Status')}}</th>
                                <th>{{__('Order Type')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@include('backend.partials.datatable.script-enqueue',['only_js' => true])
    <script type="text/javascript">
        (function(){
            "use strict";
            $(document).ready(function(){

                $('.table-wrap > table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.orders') }}",
                    columns: [
                        {data: 'checkbox', name: '', orderable: false, searchable: false},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: '', orderable: true, searchable: true},
                        {data: 'email', name: '', orderable: true, searchable: true},
                        {data: 'phone', name: '', orderable: true, searchable: true},
                        {data: 'address', name: '', orderable: true, searchable: true},
                        {data: 'amount', name: '', orderable: true, searchable: true},
                        {data: 'payment_status', name: '',orderable: true, searchable: true},
                        {data: 'status', name: ''},
                        {data: 'is_order_online', name: '',orderable: true, searchable: true},
                        {data: 'action', name: '', orderable: false, searchable: true},
                    ]
                });


                $(document).on('click','.cancel_order_delete',function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: '{{__("Are you sure to change status cancel? Once you done you can not revert this !!")}}',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).next().find('.swal_form_cancel_order_submit_btn').trigger('click');
                        }
                    });
                });

            });

        })(jQuery);
    </script>
@endsection
