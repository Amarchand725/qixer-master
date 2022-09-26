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
                        <form action="{{ route('admin.project.new') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        
                            <input type="hidden" name="requirement_id" id="requirement_id" value="{{ $requirement->id }}">
                            <input type="hidden" id="project-convert-type" name="convert_type" value="{{ $convert_type }}">
                            <div class="modal-body">
                                <h4>Requirement </h4>
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="requirement_name">Requirement Name</label>
                                        <input type="text" class="form-control" readonly name="requirement_name" required value="{{ $requirement->requirement_name }}">
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="contact_mobile">Contact Mobile</label>
                                        <input type="text" class="form-control" readonly name="contact_mobile" required value="{{ $requirement->contact_mobile }}">
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="contact_email">Contact Email</label>
                                        <input type="text" class="form-control" readonly name="contact_email" required value="{{ $requirement->contact_email }}">
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="details">Details</label>
                                        <textarea name="details" id="details" readonly class="form-control">{{ $requirement->details }}</textarea>
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="notes">Comments</label>
                                        <textarea name="notes" id="notes" readonly class="form-control">{{ $requirement->notes }}</textarea>
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        @if($requirement->attachments)
                                            <label for="notes">Attachments</label>
                                            <ul>
                                                @php $counter = 1; @endphp 
                                                @foreach ($requirement->attachments as $attachment)
                                                    <li>
                                                        <a href="{{ asset('requirements') }}/{{ $attachment }}" download><i class="fa fa-download"></i> Download Attachment - {{ $counter++ }}</a>    
                                                    </li>   
                                                @endforeach 
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        @if($requirement->deliveries)
                                            <label for="notes">Deliveries</label>
                                            <ul>
                                                @php $counter = 1; @endphp 
                                                @foreach ($requirement->deliveries as $delivery)
                                                    <li>
                                                        <a href="{{ asset('requirements') }}/{{ $delivery }}" download><i class="fa fa-download"></i> Download Attachment - {{ $counter++ }}</a>    
                                                    </li>   
                                                @endforeach 
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        @if($requirement->contract)
                                            <label for="notes">Contract</label>
                                            <ul>
                                                @php $counter = 1; @endphp 
                                                @foreach ($requirement->contract as $contract_val)
                                                    <li>
                                                        <a href="{{ asset('requirements') }}/{{ $contract_val }}" download><i class="fa fa-download"></i> Download Attachment - {{ $counter++ }}</a>    
                                                    </li>   
                                                @endforeach 
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                @if($convert_type=='single-project')
                                    <h4 class="mt-4">Single Project </h4>
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <label for="name">Project Name <span class="text-danger">*</span></label>
                                            <input type="text" id="name" readonly value="{{ $requirement->hasProject->hasProjectDetail->name }}" class="form-control" required name="name" placeholder="Enter project name">
                                            <span class="text-danger" id="error-name">{{ $errors->first('name') }}</span>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label for="timeframe">Timeframe (days) <span class="text-danger">*</span></label>
                                            <input type="number" readonly id="timeframe" value="{{ $requirement->hasProject->hasProjectDetail->timeframe }}" class="form-control" required name="timeframe" placeholder="Enter project timeframe">
                                            <span class="text-danger" id="error-timeframe">{{ $errors->first('timeframe') }}</span>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label for="total_cost">Price <span class="text-danger">*</span></label>
                                            <input type="text" readonly id="total_cost" value="{{ $requirement->hasProject->hasProjectDetail->total_cost }}" class="form-control" required name="total_cost" placeholder="Enter price">
                                            <span class="text-danger" id="error-total_cost">{{ $errors->first('total_cost') }}</span>
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label for="service_provider">Service Provider <span class="text-danger">*</span></label>
                                            <select disabled name="service_provider_id" id="service_provider_id" required class="form-control">
                                                <option value="" selected>Select service provider</option>
                                                @foreach ($sellers as $seller)
                                                    <option value="{{ $seller->id }}" {{ $requirement->hasProject->service_provider_id==$seller->id?'selected':'' }}>{{ $seller->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger" id="error-service_provider">{{ $errors->first('service_provider_id') }}</span>
                                        </div>
                                        @if($requirement->hasProject->hasProjectDetail)
                                            <div class="col-sm-12  mt-2">
                                                <label for="notes">Exist Attachment</label>
                                                <a href="{{ asset('assets/backend/project-attachments') }}/{{ $requirement->hasProject->hasProjectDetail->attachment }}" download><i class="fa fa-download"></i> Download Attachment </a>    
                                            </div>
                                        @endif
                                        <div class="col-sm-6 mt-2">
                                            <label for="status">Status</label>
                                            <select disabled name="status" id="status" class="form-control">
                                                <option value="0" selected>Pending</option>
                                                <option value="1" {{ $requirement->hasProject->hasProjectDetail->status==1?'selected':'' }}>Started</option>
                                                <option value="2" {{ $requirement->hasProject->hasProjectDetail->status==2?'selected':'' }}>Completed</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label for="description">Description</label>
                                            <textarea readonly name="description" id="description" class="form-control" cols="30" rows="5" placeholder="Enter description">{{ $requirement->hasProject->hasProjectDetail->description }}</textarea>
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>
                                @else 
                                    <h4 class="mt-4">Milestone Project </h4>
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <label for="number_of_milestone">Number of milestones <span class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" value="{{ sizeof($requirement->hasProject->haveProjectDetails) }}">
                                            <span class="text-danger">{{ $errors->first('number_of_milestone') }}</span>
                                        </div>
                                    </div>
                                    <span id="milestones">
                                        @php $counter = 1; @endphp 
                                        @foreach($requirement->hasProject->haveProjectDetails as $project)
                                            <div class="row mt-2">
                                                <div class="col-sm-12 mt-2"><label for=""><u><i class="fa fa-right-arrow"></i> Milestone.No#. {{ $counter++ }}</u></label></div>
                                                <div class="col-sm-12 mt-2">
                                                    <label for="milestone">Milestone Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="milestone" readonly class="form-control" name="milestone_names[]" value="{{ $project->name }}" required placeholder="Enter milestone name">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="milestone_cost">Milestone Price($) <span class="text-danger">*</span></label>
                                                    <input type="number" readonly id="milestone_cost" class="form-control milestone_cost" value="{{ $project->total_cost }}" required name="milestone_costs[]" placeholder="Enter milestone cost">
                                                    <span class="text-danger">{{ $errors->first('milestone_cost') }}</span>
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="milestone_service_provider">Milestone Service Provider <span class="text-danger">*</span></label>
                                                    <select disabled name="milestone_service_providers[]" id="milestone_service_provider" required class="form-control">
                                                        <option value="" selected>Select service provider</option>
                                                        @foreach ($sellers as $seller)
                                                            <option value="{{ $seller->id }}" {{ $project->service_provider_id==$seller->id?'selected':'' }}>{{ $seller->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('milestone_service_provider') }}</span>
                                                </div>
                                                @if($project->attachment)
                                                    <div class="col-sm-12  mt-2">
                                                        <label for="notes">Exist Attachment</label>
                                                        <a href="{{ asset('assets/backend/milestone-attachments') }}/{{ $project->attachment }}" download><i class="fa fa-download"></i> Download Attachment </a>    
                                                    </div>
                                                @endif
                                                <div class="col-sm-6 mt-2">
                                                    <label for="milestone_timeframe">Timeframe (days)<span class="text-danger">*</span></label>
                                                    <input type="number" readonly value="{{ $project->timeframe }}" id="milestone_timeframe" required class="form-control" name="milestone_timeframes[]" placeholder="Enter timeframe (days)">
                                                    <span class="text-danger">{{ $errors->first('milestone_timeframe') }}</span>
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="mile_status">Status</label>
                                                    <select disabled name="milestone_statuses[]" id="mile_status" class="form-control">
                                                        <option value="0" selected>Pending</option>
                                                        <option value="1" {{ $project->status==1?'selected':'' }}>Started</option>
                                                        <option value="2" {{ $project->status==1?'selected':'' }}>Completed</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <label for="milestone_description">Description</label>
                                                    <textarea readonly name="milestone_descriptions[]" id="milestone_description" class="form-control" cols="30" rows="5" placeholder="Enter milestone_description"></textarea>
                                                    <span class="text-danger">{{ $errors->first('milestone_description') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </span>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection  

@section('scripts')
@endsection