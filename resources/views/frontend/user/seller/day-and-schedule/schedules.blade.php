@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{__('Schedules')}}
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
                                <h2 class="dashboards-title"> {{__('All Schedules')}} </h2>
                                <small class="text-danger">{{ __('schedules will show while a customer booking your order') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrapper margin-top-50 text-right">
                        <button class="cmn-btn btn-bg-1" data-toggle="modal" data-target="#addScheduleModal">{{ __('Add Schedule') }}</button>
                    </div>
                    
                    <div class="mt-5"> <x-msg.error/> </div>

                    <div class="dashboard-service-single-item border-1 margin-top-40">
                        <div class="rows dash-single-inner">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('No') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Schedule') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schedules as $key => $data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ __(optional($data->days)->day) }}</td>
                                        <td>{{ $data->schedule }}</td>
                                        <td>
                                            <div class="dashboard-switch-single">
                                               <a href="#0" class="edit_schedule_modal" 
                                               data-toggle="modal" 
                                               data-target="#editScheduleModal"
                                               data-id="{{ $data->id }}"
                                               data-dayid="{{ $data->day_id }}"
                                               data-schedule="{{ $data->schedule }}"
                                               >
                                               <span class="dash-icon dash-edit-icon color-1"> <i class="las la-edit"></i> </span>
                                            </a>
                                               <x-seller-delete-popup :url="route('seller.schedule.delete',$data->id)"/>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="blog-pagination margin-top-55">
                        <div class="custom-pagination mt-4 mt-lg-5">
                            {!! $schedules->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <!-- Add Modal -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModal" aria-hidden="true">
        <form action="{{ route('seller.add.schedule') }}" method="post">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ScheduleModal">{{ __('Add New Schedule') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="day_id">{{ __('Select Day') }}</label>
                            <select name="day_id" id="day_id" class="form-control">
                                <option value="">{{ __('Select Day') }}</option>
                                @foreach($days as $day)
                                <option value="{{ $day->id }}">{{ __($day->day) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="schedule">{{ __('Schedule Time') }}</label>
                            <input type="text" name="schedule" id="schedule" class="form-control" placeholder="{{__('Schedule Time')}}">
                            <span class="info">{{__('eg: 10:00Am - 11:00PM')}}</span>
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
    <div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <form action="{{ route('seller.edit.schedule') }}" method="post">
            <input type="hidden" id="up_id" name="up_id" >
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal">{{ __('Edit Schedule') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="up_day_id">{{ __('Select Day') }}</label>
                            <select name="up_day_id" id="up_day_id" class="form-control nice-select">
                                <option value="">{{ __('Select Day') }}</option>
                                @foreach($days as $day)
                                <option value="{{ $day->id }}">{{ $day->day }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="up_schedule">{{ __('Schedule') }}</label>
                            <input type="text" name="up_schedule" id="up_schedule" class="form-control">
                            <span class="info">{{__('eg: 10:00Am - 11:00PM')}}</span>
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
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){

                $(document).on('click','.edit_schedule_modal',function(e){
                    e.preventDefault();
                    let schedule_id = $(this).data('id');
                    let day_id = $(this).data('dayid');
                    let schedule = $(this).data('schedule');
                    $('#up_id').val(schedule_id);
                    $('#up_day_id').val(day_id);
                    $('#up_schedule').val(schedule);
                    $('.nice-select').niceSelect('update');
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
                        confirmButtonText: {{__('Yes, delete it!')}}
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