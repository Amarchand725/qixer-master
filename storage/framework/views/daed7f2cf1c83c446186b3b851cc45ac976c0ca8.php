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
    @keyframes  icon-load{
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
    @media  only screen and (max-width: 990px){
        .main-timeline .timeline{
            margin-bottom: 20px;
        }
    }
    @media  only screen and (max-width: 767px){
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
            <h2 class="dashboards-title"> <?php echo e(__('Timeline')); ?> </h2>
            <h5 style="text-align: center">Current Project <span class="text-danger"> (In Progress)</span></h5>
            <?php if($project->convert_type=='single-project'): ?>
                Single Project (<?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?>)
            <?php else: ?> 
                <h5 style="text-align: center">Milestone Project (<?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?>)</h5>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="dashboard-settings margin-top-40">
            <h5>Total Number of days <span class="text-danger"> (<?php echo e($project->haveProjectDetails->sum('timeframe')); ?> days)</span></h5>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="dashboard-settings margin-top-40">
            <h5>
                <?php if($project->status==0): ?>
                    <span class="badge badge-warning" style="color:white">Pending</span>
                <?php elseif($project->status==1): ?>
                    <span class="badge badge-info" style="color:white">Started</span>
                <?php elseif($project->status==2): ?>
                    <span class="badge badge-success" style="color:white">Completed</span>
                <?php elseif($project->status==3): ?>
                    <span class="badge badge-danger" style="color:white">Rejected</span>
                <?php endif; ?>
            </h5>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="dashboard-settings margin-top-40">
            <h5>Milestone <span class="text-danger"> <?php echo e($project->hasCurrentMilestone->name); ?></span></h5>
        </div>
    </div>
</div>

<div class="mt-5"> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> </div>
<div class="dashboard-service-single-item border-1 margin-top-40">
    <div class="row">
        <?php $counter = 1; ?> 
        <?php $__currentLoopData = $project->haveProjectDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title">
                            Milestone (<?php echo e($project_detail->name); ?>) <?php echo e($counter++); ?> 
                        </h5>
                        <table class="table">
                            <tr>
                                <td>Seller Cost</td>
                                <td>$<?php echo e(number_format($project_detail->service_provider_cost, 2)); ?></td>
                            </tr>
                            <tr>
                                <td>Timeframe</td>
                                <td>(<?php echo e($project_detail->timeframe); ?> days)</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <?php if($project_detail->status==0): ?>
                                        <span class="badge badge-warning" style="color:white">Pending</span>
                                    <?php elseif($project_detail->status==1): ?>
                                        <span class="badge badge-info" style="color:white">Started</span>
                                    <?php elseif($project_detail->status==2): ?>
                                        <span class="badge badge-success" style="color:white">Completed</span>
                                    <?php elseif($project_detail->status==3): ?>
                                        <span class="badge badge-danger" style="color:white">Rejected</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 style="text-align: center">Project Timeline</h3><hr /> 
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="main-timeline d-flex justify-content-center align-items-center w-100">
                    <?php $bool = true; $counter = 1; ?> 
                    <?php $__currentLoopData = $project->haveProjectDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($bool): ?>
                            <?php $bool = false; ?> 
                            <div class="col-lg-3 timeline">
                                <span class="timeline-icon">
                                    <i class="fa fa-"><?php echo e($counter++); ?></i>
                                </span>
                                <div class="border <?php if($detail->status): ?> active <?php endif; ?>"></div>
                                <div class="timeline-content <?php if($detail->status): ?> active <?php endif; ?>"> 
                                    <h4 class="title"><?php echo e($detail->name); ?></h4>
                                    <p class="description"><?php echo e($detail->description); ?> </p>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php $bool = true; ?> 
                            <div class="col-lg-3  timeline">
                                <div class="timeline-content <?php if($detail->status): ?> active <?php endif; ?>">
                                    <h4 class="title"><?php echo e($detail->name); ?></h4>
                                    <p class="description"><?php echo e($detail->description); ?></p>
                                </div>
                                <div class="border <?php if($detail->status): ?> active <?php endif; ?>"></div>
                                <span class="timeline-icon">
                                    <i class="fa fa-"><?php echo e($counter++); ?></i>
                                </span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/seller/activity/timeline.blade.php ENDPATH**/ ?>