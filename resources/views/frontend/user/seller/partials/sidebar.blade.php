<style>
    .list-group.panel > .list-group-item {
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px
    }
    .list-group-submenu {
    margin-left:20px;
    }
</style>
<div class="dashboard-left-content">
    <div class="dashboard-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-top padding-top-40">
            <div class="thumb">
                @if(!is_null(Auth::guard('web')->user()->image))
                {!! render_image_markup_by_attachment_id(Auth::guard('web')->user()->image) !!}
                @else
                    <img src="{{ asset('assets/frontend/img/static/user_profile.png') }}" alt="No Image"> 
                @endif
            </div>
            <div class="author-content">
                <h4 class="title"> {{ Auth::guard('web')->user()->name }} </h4>
                <strong><a href="{{ route('homepage') }}">{{ __('Visit Site') }}</a></strong>
            </div>
        </div>
        <div class="dashboard-bottom margin-top-35 margin-bottom-50">
            <ul class="dashboard-list ">
                <li class="list @if(request()->is('seller/dashboard*')) active @endif">
                    <a href="{{ route('seller.dashboard') }}"> <i class="las la-th"></i> {{__('Dashboard')}} </a>
                </li>
                <li class="list @if(request()->is('seller/activity*')) active @endif">
                    <a href="{{ route('seller.activity') }}"> <i class="las la-th"></i> {{__('Activity')}} </a>
                    @if(request()->is('seller/activity*'))
                        @php 
                            $projects = App\Project::where('service_provider_id', Auth::user()->id)->groupby('service_provider_id')->get();
                        @endphp
                        <div id="MainMenu">
                            <div class="list-group">
                                <a href="#activity" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu"><i class="las la-user"></i> {{__('Clients')}}</a>
                                <div class="collapse" id="activity">
                                    @foreach ($projects as $project_key=>$project)
                                        <a href="#project-{{ $project_key }}" class="list-group-item list-group-item-success client-projects" data-client-id="{{ $project->client_id }}" data-toggle="collapse" data-parent="#MainMenu"> {{ Str::ucfirst($project->client->name) }}</a>
                                        <div class="collapse" id="project-{{ $project_key }}">
                                            @if($project->status == 1)
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
                                                                ->where('is_seller_read', 0)
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
                                            @endif
                                            <a href="#past-project" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#past-project">Past Project <i class="fa fa-caret-down"></i></a>
                                            <div class="collapse list-group-submenu" id="past-project">
                                                @if($project->status == 2 || $project->status == 3)
                                                    <a href="#" class="list-group-item list-group-item-success">{{ Str::ucfirst($project->hasRequirement->requirement_name) }}</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </li>

                <li class="list @if(request()->is('seller/coupons*')) active @endif">
                    <a href="{{ route('seller.service.coupon') }}"> <i class="las la-gifts"></i> {{__('Service Coupons')}} </a>
                </li>
                <li class="list @if(request()->is('seller/services*') || request()->is('seller/add-services*') || request()->is('seller/service-attributes*') || request()->is('seller/edit-services*') || request()->is('seller/edit-service-attributes*') || request()->is('seller/add-service-attributes-by-id*')) active @endif">
                    <a href="{{ route('seller.services') }}"> <i class="las la-cogs"></i>{{ __('Services') }} </a>
                </li>
                <li class="list @if(request()->is('seller/days*') || request()->is('seller/add-day*')) active @endif">
                    <a href="{{ route('seller.days') }}"> <i class="las la-calendar-week"></i>{{ __('Create Day') }} </a>
                </li>
                <li class="list @if(request()->is('seller/schedules*') || request()->is('seller/add-schedule*')) active @endif">
                    <a href="{{ route('seller.schedules') }}"> <i class="las la-clock"></i>{{ __('Create Schedule') }} </a>
                </li>
                <li class="list @if(request()->is('seller/pending-orders')) active @endif">
                    <a href="{{ route('seller.pending.orders') }}"> <i class="las la-tasks"></i> {{ __('Order Pending') }} </a>
                </li>
                <li class="list @if(request()->is('seller/orders*')) active @endif">
                    <a href="{{ route('seller.orders') }}"> <i class="las la-list-alt"></i> {{ __('All Orders') }} </a>
                </li>
                <li class="list @if(request()->is('seller/notification/all-notifications*')) active @endif">
                    <a href="{{ route('seller.notification.all') }}"> <i class="las la-bell"></i> {{ __('All Notifications') }} </a>
                </li>
                <li class="list @if(request()->is('seller/payout-request*')) active @endif">
                    <a href="{{ route('seller.payout') }}"> <i class="las la-dollar-sign"></i>{{ __('Payout History') }} </a>
                </li>
                <li class="list @if(request()->is('seller/service-reviews*')) active @endif">
                    <a href="{{ route('seller.service.review') }}"> <i class="lar la-star"></i>{{ __('Review') }}</a>
                </li>
                <li class="list @if(request()->is('seller/all-tickets*')) active @endif">
                    <a href="{{ route('seller.support.ticket') }}"> <i class="las la-headset"></i>{{ __('Support Ticket') }}</a>
                </li>
                <li class="list @if(request()->is('seller/to-do-list*')) active @endif">
                    <a href="{{ route('seller.todolist') }}"> <i class="las la-list"></i>{{ __('Todo List') }}</a>
                </li>
                <li class="list @if(request()->is('seller/profile*')) active @endif">
                    <a href="{{ route('seller.profile')}}"> <i class="las la-user"></i> {{__('Profile')}} </a>
                </li>
                <li class="list @if(request()->is('seller/seller-profile-verify*')) active @endif">
                    <a href="{{ route('seller.profile.verify')}}"> <i class="las la-user"></i> {{__('Profile Verify')}} </a>
                </li>
                <li class="list @if(request()->is('seller/account-settings*')) active @endif">
                    <a href="{{ route('seller.account.settings') }}"> <i class="las la-cog"></i> {{__('Settings')}} </a>
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
            url : "{{ route('seller.get_project_details') }}",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
</script>