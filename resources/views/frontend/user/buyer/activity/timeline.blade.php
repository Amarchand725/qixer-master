<style>
    .main-timeline .timeline{
        padding: 0 2px;
        position: relative;
    }
    .main-timeline .timeline-icon{
        display: block;
        text-align: center;
        padding: 20px 0 55px 0;
        z-index: 1;
        position: relative;
    }
    .main-timeline .timeline:nth-child(2n) .timeline-icon{
        padding: 55px 0 20px 0;
    }
    .main-timeline .timeline-icon:before{
        content: "";
        width: 1px;
        height: 75%;
        background: #39ae99;
        margin: 0 auto;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: -1;
        transition: all 0.3s ease 0s;
    }
    .main-timeline .timeline:nth-child(2n) .timeline-icon:before{
        bottom: auto;
        top: 0;
    }
    .main-timeline .timeline:hover .timeline-icon:before{
        background: #2bd887;
    }
    .main-timeline .timeline-icon i{
        width: 45px;
        height: 45px;
        line-height:45px;
        border-radius: 50%;
        background: #1dbf73;
        font-size: 14px;
        color: #fff;
        transition: all 0.3s ease 0s;
    }
    .main-timeline .timeline:hover .timeline-icon i{
        background: #2bd887;
        animation: icon-load 2.5s ease 0s infinite;
    }
    .main-timeline .border{
        height: 15px;
        background: #1dbf73;
        margin-bottom: 20px;
        transition: all 0.3s ease 0s;
    }
    .main-timeline .timeline:hover .border{
        background: #2bd887;
    }
    .main-timeline .timeline:first-child .border{
        border-radius: 4px 0 0 4px;
    }
    .main-timeline .timeline:last-child .border{
        border-radius: 0 4px 4px 0;
    }
    .main-timeline .timeline:nth-child(2n) .border{
        margin: 14px 0 0 0;
    }
    .main-timeline .timeline-content{
        padding: 11px;
        border: 1px solid #ddd;
        background: #1dbf73;
        border-radius: 4px;
        transition: all 0.3s ease 0s;
        height: auto;
    }
    .main-timeline .timeline:hover .timeline-content{
        background: #2bd887;
    }
    .main-timeline .title{
        font-size: 18px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        margin: 0 0 10px 0;
        transition: all 0.3s ease 0s;
    }
    .main-timeline .timeline:hover .title{
        color: #fff;
    }
    .timeline-content .description{
        /* font-size: 14px;
        color: #888;
        margin: 0;
        transition: all 0.3s ease 0s; */
        font-size: 14px;
        color: #888;
        display:block;
        width:100%;
        height:50px;
        overflow:scroll;
    }
    .main-timeline .timeline:hover .description{
        color: #fff;
    }
    @keyframes icon-load{
        0%{ transform: rotate(-12deg); }
        8%{ transform: rotate(12deg); }
        10%{ transform: rotate(24deg); }
        18%,20%{ transform: rotate(-24deg); }
        28%,30%{ transform: rotate(24deg); }
        38%,40%{ transform: rotate(-24deg); }
        48%,50%{ transform: rotate(24deg); }
        58%,60%{ transform: rotate(-24deg); }
        68%{ transform: rotate(24deg); }
        100%,75%{ transform: rotate(0deg); }
    }
    @media only screen and (max-width: 990px){
        .main-timeline .timeline{
            margin-bottom: 20px;
        }
    }
    @media only screen and (max-width: 767px){
        .main-timeline .timeline-icon{
            padding-top: 0;
        }
        .main-timeline .timeline:nth-child(2n) .timeline-icon{
            padding-bottom: 0;
        }
        .main-timeline .border{
            margin-bottom: 10px;
        }
        .main-timeline .timeline:nth-child(2n) .border{
            margin: 14px 0 0 0;
        }
        .main-timeline .timeline-content{
            text-align: center;
        }
    }

    .active{
        background-color: #2bd887 !important;
        color: white !important;
    }

    .active h4, p{
        color: white !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-settings margin-top-40">
            <h2 class="dashboards-title"> {{__('Timeline')}} </h2>
            <h5 style="text-align: center">Current Project <span class="text-danger"> (In Progress)</span></h5>
            @if($project->convert_type=='single-project')
                Single Project ({{ Str::ucfirst($project->hasRequirement->requirement_name) }})
            @else 
                <h5 style="text-align: center">Milestone Project ({{ Str::ucfirst($project->hasRequirement->requirement_name) }})</h5>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="dashboard-settings margin-top-40">
            <h5>Total Number of days <span class="text-danger"> ({{ $project->haveProjectDetails->sum('timeframe') }} days)</span></h5>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="dashboard-settings margin-top-40">
            <h5>
                @if($project->status==0)
                    <span class="badge badge-warning" style="color:white">Pending</span>
                @elseif($project->status==1)
                    <span class="badge badge-info" style="color:white">Started</span>
                @elseif($project->status==2)
                    <span class="badge badge-success" style="color:white">Completed</span>
                @elseif($project->status==3)
                    <span class="badge badge-danger" style="color:white">Rejected</span>
                @endif
            </h5>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="dashboard-settings margin-top-40">
            <h5>Milestone <span class="text-danger"> {{ $project->hasCurrentMilestone->name }}</span></h5>
        </div>
    </div>
</div>

<div class="mt-5"> <x-msg.error/> </div>
<div class="dashboard-service-single-item border-1 margin-top-40">
    <div class="row">
        @php $counter = 1; @endphp 
        @foreach ($project->haveProjectDetails as $project_detail)
            <div class="col-md-4">
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title">
                            Milestone ({{ $project_detail->name }}) {{ $counter++ }} 
                        </h5>
                        <table class="table">
                            <tr>
                                <td>Milestone Cost</td>
                                <td>${{ number_format($project_detail->total_cost, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Timeframe</td>
                                <td>({{ $project_detail->timeframe }} days)</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if($project_detail->status==0)
                                        <span class="badge badge-warning" style="color:white">Pending</span>
                                    @elseif($project_detail->status==1)
                                        <span class="badge badge-info" style="color:white">Started</span>
                                    @elseif($project_detail->status==2)
                                        <span class="badge badge-success" style="color:white">Completed</span>
                                    @elseif($project_detail->status==3)
                                        <span class="badge badge-danger" style="color:white">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 style="text-align: center">Project Timeline</h3><hr /> 
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="main-timeline d-flex justify-content-center align-items-center w-100">
                    @php $bool = true; $counter = 1; @endphp 
                    @foreach ($project->haveProjectDetails as $detail)
                        @if($bool)
                            @php $bool = false; @endphp 
                            <div class="col-lg-3 timeline">
                                <span class="timeline-icon">
                                    <i class="fa fa-">{{ $counter++ }}</i>
                                </span>
                                <div class="border @if($detail->status) active @endif"></div>
                                <div class="timeline-content @if($detail->status) active @endif"> 
                                    <h4 class="title">{{ $detail->name }}</h4>
                                    <p class="description">{{ $detail->description }} </p>
                                </div>
                            </div>
                        @else 
                            @php $bool = true; @endphp 
                            <div class="col-lg-3  timeline">
                                <div class="timeline-content @if($detail->status) active @endif">
                                    <h4 class="title">{{ $detail->name }}</h4>
                                    <p class="description">{{ $detail->description }}</p>
                                </div>
                                <div class="border @if($detail->status) active @endif"></div>
                                <span class="timeline-icon">
                                    <i class="fa fa-">{{ $counter++ }}</i>
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>