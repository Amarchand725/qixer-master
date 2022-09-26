@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{ __('Activity') }}
@endsection
@section('style')
    <style>
        .table-td-padding {
            border-collapse: separate;
            border-spacing: 10px 20px;
        }

        .list-group > .list-group {
            display: none;
            margin-bottom: 0;
        }
        .list-group-item:focus-within + .list-group {
            display: block;
        }

        .list-group > .list-group-item {
            border-radius: 0;
            border-width: 1px 0 0 0;
        }

        .list-group > .list-group-item:first-child {
            border-top-width: 0;
        }

        .list-group  > .list-group > .list-group-item {
            padding-left: 2.5rem;
        }
    </style>
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
                                <h2 class="dashboards-title">{{ __('Activity') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 margin-top-40">
                            <div class="author-content">
                                <h4 class="title"> CLIENTS </h4>
                            </div>
                            <div id="accordion">
                                <div class="card">
                                    @foreach ($clients as $client_key=>$client)
                                        <div class="card-header" id="heading-1">
                                            <h5 class="mb-0">
                                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                    {{ $client->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
                                            <div class="card-body">
                                                <div id="accordion-1">
                                                    <div class="card">
                                                        <div class="card-header" id="heading-1-1">
                                                            <h5 class="mb-0">
                                                                <a class="collapsed current-project" role="button" data-toggle="collapse" href="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                                                    Current Project
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse-1-1" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-1">
                                                            <div class="card-body">
                                                                <div id="accordion-1-1-{{ $client_key }}">
                                                                    @foreach ($client->haveRequirements as $requirement)
                                                                        @if($requirement->hasProject != null && $requirement->hasProject->status==0)
                                                                            <div class="card">
                                                                                <div class="card-header" id="heading-1-1-1">
                                                                                    <h5 class="mb-0">
                                                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-1" aria-expanded="false" aria-controls="collapse-1-1-1">
                                                                                        {{ Str::ucfirst($requirement->hasProject->name) }}
                                                                                        </a>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            @break
                                                                        @elseif($requirement->hasMilestoneProject != null && $requirement->hasMilestoneProject->status==0) 
                                                                            <div class="card">
                                                                                @php $counter=1 @endphp 
                                                                                @foreach ($requirement->haveMilestoneProjects as $key=>$milestone_project)
                                                                                    <div class="card-header" id="heading-1-1-2-{{ $key }}">
                                                                                        <h5 class="mb-0">
                                                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-2-{{ $key }}" aria-expanded="false" aria-controls="collapse-1-1-2-{{ $key }}">
                                                                                            Milestone: {{ $counter++ }}. {{ Str::ucfirst($milestone_project->name) }}
                                                                                            </a>
                                                                                        </h5>
                                                                                        <div id="collapse-1-1-2-{{ $key }}" class="collapse" data-parent="#accordion-1-1-{{ $client_key }}" aria-labelledby="heading-1-1-2-{{ $key }}">
                                                                                            <div class="card-body">
                                                                                                <h5 class="mb-0">
                                                                                                    <a href="">Activity</a> 
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div id="collapse-1-1-2-{{ $key }}" class="collapse" data-parent="#accordion-1-1-{{ $client_key }}" aria-labelledby="heading-1-1-2-{{ $key }}">
                                                                                            <div class="card-body">
                                                                                                <h5 class="mb-0">
                                                                                                    <a href="">Timeline</a>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div id="collapse-1-1-2-{{ $key }}" class="collapse" data-parent="#accordion-1-1-{{ $client_key }}" aria-labelledby="heading-1-1-2-{{ $key }}">
                                                                                            <div class="card-body">
                                                                                                <h5 class="mb-0">
                                                                                                    <a href="">Delivery</a>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div> 
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            @break
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <!-- second -->
                                                    <div id="accordion-2">
                                                        <div class="card">
                                                            <div class="card-header" id="heading-2-1">
                                                                <h5 class="mb-0">
                                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2-1" aria-expanded="false" aria-controls="collapse-2-1">
                                                                    Past Projects
                                                                </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse-2-1" class="collapse" data-parent="#accordion-2" aria-labelledby="heading-2-1">
                                                                <div class="card-body">
                                                                    <div id="accordion-2-1">
                                                                        <div class="card">
                                                                            <div class="card-header" id="heading-2-1-1">
                                                                                @foreach ($client->haveRequirements as $requirement)
                                                                                    @if(!empty($requirement->hasProject) && $requirement->hasProject->status!=1)
                                                                                        <h5 class="mb-0">
                                                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2-1-1" aria-expanded="false" aria-controls="collapse-2-1-1">
                                                                                            {{ Str::ucfirst($requirement->requirement_name) }}
                                                                                            </a>
                                                                                        </h5>
                                                                                    @elseif(!empty($requirement->hasMilestoneProject) && $requirement->hasMilestoneProject->status!=1)
                                                                                        <h5 class="mb-0">
                                                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2-1-1" aria-expanded="false" aria-controls="collapse-2-1-1">
                                                                                            {{ Str::ucfirst($requirement->requirement_name) }}
                                                                                            </a>
                                                                                        </h5>
                                                                                    @endif
                                                                                @endforeach
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 margin-top-40">
                            <div class="author-content">
                                <h4 class="title"> CLIENTS </h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.current-project', function(){
            alert();
        });
    </script>
@endsection
