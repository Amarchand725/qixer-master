@extends('frontend.user.buyer.buyer-master')
@section('site-title')
    {{__('Requirements')}}
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
                @include('frontend.user.buyer.partials.sidebar')
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> {{__('Requirements')}} </h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5"> <x-msg.error/> </div>
                    <div class="dashboard-service-single-item border-1 margin-top-40">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="table-wrap table-responsive">
                                        <table class="table table-default">
                                            <thead>
                                            <th class="no-sort">
                                                <div class="mark-all-checkbox">
                                                    <input type="checkbox" class="all-checkbox">
                                                </div>
                                            </th>
                                            <th>{{__('ID')}}</th>
                                            <th>{{__('Create Date')}}</th>
                                            <th>{{__('Requirement Name')}}</th>
                                            <th>{{__('Client')}}</th>
                                            <th>{{__('Project Manager')}}</th>
                                            <th>{{__('Action')}}</th>
                                            </thead>
                                            <tbody>
                                                @foreach($requirements as $data)
                                                    <tr>
                                                        <td>
                                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                                        </td>

                                                        
                                                        <td>{{$data->id}}</td>
                                                        <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                                                        <td>{{$data->requirement_name}}</td>
                                                        <td>{{$data->client->name}}</td>
                                                        <td>{{$data->project_manager->name}}</td>
                                                        
                                                        <td>
                                                            <a class="btn btn-info btn-sm" title="Show Details" href="{{ route('buyer.show',$data->id) }}"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="blog-pagination margin-top-55">
                                        <div class="custom-pagination mt-4 mt-lg-5">
                                            {!! $requirements->links() !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection  

@section('scripts')
@endsection