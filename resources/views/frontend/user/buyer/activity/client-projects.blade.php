<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-settings margin-top-40">
            <h2 class="dashboards-title"> {{__('Your Projects')}} </h2>
        </div>
    </div>
</div>

<div class="mt-5"> <x-msg.error/> </div>
<div class="dashboard-service-single-item border-1 margin-top-40">
    <div class="row">
        <table class="table">
            <tr>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Type</th>
                <th>Priority</th>
                <th>Badget</th>
                <th>Delivery (days)</th>
                <th>Assigned</th>
                <th>Started</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($projects as $project)     
                <tr>
                    <td>{{ $project->id }}.</td>
                    <td>{{ Str::ucfirst($project->hasRequirement->requirement_name) }}</td>
                    <td>
                        @if($project->convert_type=='single-project')
                            <span class="badge badge-info">Single</span>
                        @else 
                            <span class="badge badge-info">Milestone</span>
                        @endif
                    </td>
                    <td>{{ $project->hasRequirement->priority }}</td>
                    <td>${{ number_format($project->haveProjectDetails->sum('total_cost'), 2) }}</td>
                    <td>{{ $project->haveProjectDetails->sum('timeframe') }} days</td>
                    <td>{{ date('d, M-Y', strtotime($project->created_at)) }}</td>
                    <td>
                        @if($project->status!=0)
                            {{ date('d, M-Y', strtotime($project->updated_at)) }}
                        @else 
                            --
                        @endif
                    </td>
                    <td>
                        @if($project->status==0)
                            <span class="badge badge-warning">Pending</span>
                        @elseif($project->status==1)
                            <span class="badge badge-info">Started</span>
                        @elseif($project->status==2)
                            <span class="badge badge-success">Completed</span>
                        @elseif($project->status==2)
                            <span class="badge badge-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-success btn-sm show-project-details-btn" value="{{ $project->id }}"><i class="fa fa-eye"></i> Show</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>