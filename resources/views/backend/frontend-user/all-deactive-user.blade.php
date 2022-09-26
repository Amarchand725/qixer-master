@extends('backend.admin-master')
@section('style')
    <x-datatable.css/>
@endsection

@section('site-title')
    {{__('All Deactive Users')}}
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">{{__('Deactive Users')}}</h4>
                                    <small>{{ __('User list who deactive their account from frontend.') }}</small> <br><br>
                                    <div class="data-tables datatable-primary table-wrap">
                                        <table class="text-center">
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="mark-all-checkbox">
                                                        <input type="checkbox" class="all-checkbox">
                                                    </div>
                                                </th>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Email')}}</th>
                                                <th>{{__('Reason')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Description')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_user as $data)
                                                <tr>
                                                    <td><x-bulk-delete-checkbox :id="$data->id"/></td>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{optional($data->user)->name}}</td>
                                                    <td>{{optional($data->user)->email}}</td>
                                                    <td>{{$data->reason}}</td>
                                                    <td>
                                                        @if($data->status==0)
                                                          <span class="text-danger">{{ __('Deactive') }}</span>
                                                        @endif  
                                                    </td>
                                                    <td>{{$data->description}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Primary table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <x-datatable.js/>
@endsection
