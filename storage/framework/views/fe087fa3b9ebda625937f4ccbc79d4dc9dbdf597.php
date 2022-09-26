<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-settings margin-top-40">
            <h2 class="dashboards-title"> <?php echo e(__('Project Details')); ?> </h2>
            <h5 style="text-align: center">Current Project <span class="text-danger"> (In Progress)</span></h5>
            <?php if($project->convert_type=='single-project'): ?>
                Single Project (<?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?>)
            <?php else: ?> 
                <h5 style="text-align: center">Milestones (<?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?>)</h5>
            <?php endif; ?>
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
        <?php $counter = 1; $bool = true; ?> 
        <?php $__currentLoopData = $project->haveProjectDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title">Milestone (<?php echo e($project_detail->name); ?>) <?php echo e($counter++); ?></h5>
                        <table class="table">
                            <tr>
                                <td>Milestone Cost</td>
                                <td>$<?php echo e(number_format($project_detail->total_cost, 2)); ?></td>
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
                            <?php if(!empty($project_detail->hasPayment)): ?>
                                <?php if($project_detail->attachment): ?>
                                    <tr>
                                        <td>Attachment</td>
                                        <td>
                                            <a href="<?php echo e(asset('assets/backend/project-attachments')); ?>/<?php echo e($project_detail->attachment); ?>" download="" class="badge badge-info"><i class="fa fa-download"></i>Download Attachment</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="2"><?php echo e($project_detail->description); ?></td>
                                </tr>
                            <?php else: ?> 
                                <?php if(empty($project_detail->hasPayment) && $bool): ?>
                                    <?php $bool = false ?> 
                                    <tr>
                                        <td colspan="2" style="text-align:center">
                                            <button class="btn btn-success btn-sm fund-btn" data-amount="<?php echo e($project_detail->total_cost); ?>" data-project-id="<?php echo e($project_detail->project_id); ?>" value="<?php echo e($project_detail->id); ?>">Fund Now</button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <h3>Information</h3>
            <table class="table">
                <tr>
                    <td>Project Manager</td>
                    <td><b><?php echo e(Str::ucfirst($project->hasRequirement->project_manager->name??'N/A')); ?></b></td>
                </tr>
                <tr>
                    <td>Seller</td>
                    <td><b><?php echo e($project->hasSeller->name??'N/A'); ?></b></td>
                </tr>
            </table>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/activity/current-project-details.blade.php ENDPATH**/ ?>