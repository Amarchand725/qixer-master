<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-settings margin-top-40">
            <h2 class="dashboards-title"> {{__('Project Details')}} </h2>
            <h5 style="text-align: center">Current Project <span class="text-danger"> (In Progress)</span></h5>
            @if($project->convert_type=='single-project')
                Single Project ({{ Str::ucfirst($project->hasRequirement->requirement_name) }})
            @else 
                <h5 style="text-align: center">Milestones ({{ Str::ucfirst($project->hasRequirement->requirement_name) }})</h5>
            @endif
        </div>
    </div>
</div>

<div class="mt-5"> <x-msg.error/> </div>
<div class="dashboard-service-single-item border-1 margin-top-40">
    <div class="row">
        @php $counter = 1; @endphp 
        @foreach ($project->haveProjectDetails as $project)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Milestone ({{ $project->name }}) {{ $counter++ }}</h5>
                        <table class="table">
                            <tr>
                                <td>Seller Cost</td>
                                <td>${{ number_format($project->service_provider_cost, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Timeframe (days)</td>
                                <td>({{ $project->timeframe }} days)</td>
                            </tr>
                            {{-- @if($project->attachment)
                                <tr>
                                    <td>Attachment</td>
                                    <td>
                                        <a href="{{ asset('assets/backend/project-attachments') }}/{{ $project->attachment }}" download="" class="badge badge-info"><i class="fa fa-download"></i>Download Attachment</a>
                                    </td>
                                </tr>
                            @endif --}}
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if($project->status==0)
                                        <span class="badge badge-warning" style="color:white">Pending</span>
                                    @elseif($project->status==1)
                                        <span class="badge badge-info" style="color:white">Started</span>
                                    @elseif($project->status==2)
                                        <span class="badge badge-success" style="color:white">Completed</span>
                                    @elseif($project->status==3)
                                        <span class="badge badge-danger" style="color:white">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><button type="button" class="btn btn-success btn-sm view-details-btn" id="view-details-btn" value="{{ $project->id }}">View Details</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>