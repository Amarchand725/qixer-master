<div class="dashboard-left-content">
    <div class="dashboard-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-top padding-top-40">
            <div class="thumb">
                @if(!is_null(Auth::guard('web')->user()->image))
                {!! render_image_markup_by_attachment_id(Auth::guard('web')->user()->image) !!}
                @else
                <img src="{{ asset('assets/frontend/img/static/user_profile.png') }}" alt="{{ __('No Image') }}"> 
                @endif
            </div>
            <div class="author-content">
                <h4 class="title"> {{ Auth::guard('web')->user()->name }} </h4>
                <strong><a href="{{ route('homepage') }}">{{ __('Visit Site') }}</a></strong>
            </div>
        </div>
        <div class="dashboard-bottom margin-top-35 margin-bottom-50">
            <ul class="dashboard-list ">
                <li class="list @if(request()->is('buyer/dashboard*')) active @endif">
                    <a href="{{ route('buyer.dashboard') }}"> <i class="las la-th"></i> {{__('Dashboard')}} </a>
                </li>
                <li class="list @if(request()->is('buyer/orders*')) active @endif">
                    <a href="{{ route('buyer.orders') }}"> <i class="las la-tasks"></i>{{ __('All Orders') }}</a>
                </li>
                <li class="list @if(request()->is('buyer/activity*')) active @endif">
                    <a href="{{ route('buyer.activity') }}"> <i class="las la-th"></i> {{__('Activity')}} </a>
                    @if(request()->is('buyer/activity*'))
                        @php 
                            $project = App\Project::where('client_id', Auth::user()->id)->where('status', 1)->first();
                        @endphp
                        <div id="MainMenu">
                            <div class="list-group">
                                <a href="#activity" class="list-group-item list-group-item-success client-projects" data-toggle="collapse" data-parent="#MainMenu"><i class="las la-task"></i> {{__('Projects')}}</a>
                                <div class="collapse" id="activity">
                                    <a href="#current-project" id="current-project-label" class="list-group-item list-group-item-success current-project" data-project-id="{{ $project->id }}" data-toggle="collapse" data-parent="#current-project">Current Project ({{ Str::ucfirst($project->hasRequirement->requirement_name) }}) <i class="fa fa-caret-down"></i></a>
                                    <div class="collapse list-group-submenu" id="current-project">
                                        <a class="list-group-item list-group-item-success activity-timeline" data-project-id="{{ $project->id }}" data-toggle="collapse" data-parent="#timeline"><i class="fa fa-clock-o"></i> Timeline</a>
                                        @if($project->convert_type=='single-project')
                                            <a href="#" class="list-group-item list-group-item-success">{{ Str::ucfirst($project->hasProjectDetail->name) }}</a>
                                        @else 
                                            @php $counter=1 @endphp 
                                            @foreach ($project->haveProjectDetails as $milestone_key=>$milestone_project)
                                                <a href="#Subcurrent-project-{{ $milestone_key }}" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#Subcurrent-project-{{ $milestone_key }}">
                                                    {{ $counter++ }}. {{ Str::ucfirst($milestone_project->name) }} <i class="fa fa-caret-down"></i>
                                                </a>
                                                <div class="collapse list-group-submenu list-group-submenu-1" id="Subcurrent-project-{{ $milestone_key }}">
                                                    @php 
                                                        $unread_messages_count = App\Chat::where('reciever_id', Auth::user()->id)
                                                        ->where('project_details_id', $milestone_project->id)
                                                        ->where('is_read', 0)
                                                        ->count();

                                                        $pending_deliveries_count = App\ProjectDelivery::where('project_detial_id', $milestone_project->id)
                                                        ->where('is_client_read', 0)
                                                        ->count();
                                                    @endphp 
                                                    <a class="list-group-item list-group-item-success activity-chat" data-milestone-id="{{ $milestone_project->id }}" data-parent="#Subcurrent-project-{{ $milestone_key }}">Inbox 
                                                        @if($unread_messages_count>0)
                                                            <span class="badge badge-danger" id="unread-counter">{{ $unread_messages_count }}</span>
                                                        @endif
                                                    </a>
                                                    <a class="list-group-item list-group-item-success activity-delivery" data-milestone-id="{{ $milestone_project->id }}" data-parent="#Subcurrent-project-{{ $milestone_key }}">Delivery
                                                        @if($pending_deliveries_count>0)
                                                            <span class="badge badge-danger" id="unread-delivery-counter">{{ $pending_deliveries_count }}</span>
                                                        @endif
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <a href="#past-project" class="list-group-item list-group-item-success client-projects" data-status="other-project" data-toggle="collapse" data-parent="#past-project">Past Projects</a>
                                    <div class="collapse list-group-submenu" id="past-project">
                                        @if($project->status == 2 || $project->status == 3)
                                            <a href="#" class="list-group-item list-group-item-success">{{ Str::ucfirst($project->hasRequirement->requirement_name) }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </li>
                <li class="list @if(request()->is('buyer/all-tickets*')) active @endif">
                    <a href="{{ route('buyer.support.ticket') }}"> <i class="lar la-star"></i>{{ __('Support Ticket') }}</a>
                </li>
                <li class="list @if(request()->is('buyer/requirement*')) active @endif">
                    <a href="{{ route('buyer.requirement') }}"> <i class="lar la-star"></i>{{ __('Requirements') }}</a>
                </li>
                <li class="list @if(request()->is('buyer/profile*')) active @endif">
                    <a href="{{ route('buyer.profile')}}"> <i class="las la-user"></i> {{__('Profile')}} </a>
                </li>
                <li class="list @if(request()->is('buyer/account-settings*')) active @endif">
                    <a href="{{ route('buyer.account.settings') }}"> <i class="las la-cog"></i> {{__('Password Change')}} </a>
                </li>
                <li class="list">
                    <a href="{{ route('seller.logout')}}"> <i class="las la-sign-out-alt"></i> {{__('Log Out' )}} </a>
                </li>
            </ul>
        </div>
        <div class="dashboard-logo padding-top-100">
            <a href="{{ route('homepage') }}" class="logo"> 
                {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
            </a>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#current-project-label', function(){
        var project_id = $(this).attr('data-project-id');

        $.ajax({
            url : "{{ route('buyer.get_project_details') }}",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
</script>