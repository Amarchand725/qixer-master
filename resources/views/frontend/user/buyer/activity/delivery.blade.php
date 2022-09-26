<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-settings margin-top-40">
            <h2 class="dashboards-title"> {{__('Deliveries')}} </h2>
            <h5 style="text-align: center">Current Project <span class="text-danger"> (In Progress)</span></h5>
            @if($project_detail->hasProject->convert_type=='single-project')
                Single Project ({{ Str::ucfirst($project_detail->hasProject->hasRequirement->requirement_name) }})
            @else 
                <h5 style="text-align: center">Milestone Project ({{ Str::ucfirst($project_detail->hasProject->hasRequirement->requirement_name) }})</h5>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="dashboard-settings margin-top-40">
            <h5>Milestone {{ $project_detail->name }}</h5>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="dashboard-settings margin-top-40">
            <h5 style="text-align: right">
                Status: 
                @if($project_detail->status==0)
                    <span class="badge badge-warning" style="color:white">Pending</span>
                @elseif($project_detail->status==1)
                    <span class="badge badge-info" style="color:white">Started</span>
                @elseif($project_detail->status==2)
                    <span class="badge badge-success" style="color:white">Completed</span>
                @elseif($project_detail->status==3)
                    <span class="badge badge-danger" style="color:white">Rejected</span>
                @endif
            </h5>
        </div>
    </div>
</div>

<div class="mt-5"> <x-msg.error/> </div>
<div class="dashboard-service-single-item border-1 margin-top-40">
    @if(sizeof($project_detail->hasDeliveries)>0)
        <div class="row delivery-list">
            @foreach ($project_detail->hasDeliveries as $delivery)
                <div class="col-md-4">
                    <div class="card"> 
                        <div class="card-body">
                            <h5 class="card-title">Milestone ({{ $project_detail->name }})</h5>
                            <table class="table">
                                <tr>
                                    <td>Milestone Cost</td>
                                    <td>${{ number_format($project_detail->total_cost, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Submited Date</td>
                                    <td>{{ date('d, F-Y H:i A', strtotime($delivery->created_at)) }}</td>
                                </tr>
                                @if(!empty($delivery->attachment))
                                    <tr>
                                        <td>Attachment</td>
                                        <td>
                                            <a href="{{ asset('assets/delivery/attachments') }}/{{ $delivery->attachment }}" download="" class="badge badge-info"><i class="fa fa-download"></i>Download Attachment</a>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if($delivery->status==0)
                                            <span class="badge badge-warning" style="color:white">Pending</span>
                                        @elseif($delivery->status==1)
                                            <span class="badge badge-info" style="color:white">Accepted</span>
                                        @elseif($delivery->status==2)
                                            <span class="badge badge-danger" style="color:white">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">{!! $delivery->describe !!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title">Deliver Milestone ({{ $project_detail->name }})</h5>
                        <form action="">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" selected>Pending</option>
                                    <option value="1">Accept</option>
                                    <option value="2">Reject</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="describe">Describe</label>
                                <textarea name="describe" id="describe" class="form-control" placeholder="Enter message for client"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" value="{{ $delivery->id }}" class="form-control btn btn-success deliver-btn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else 
        <h4>Not found delivery</h4>
    @endif`
</div>