<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-settings margin-top-40">
            <h2 class="dashboards-title"> <?php echo e(__('Your Projects')); ?> </h2>
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
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                <tr>
                    <td><?php echo e($project->id); ?>.</td>
                    <td><?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?></td>
                    <td>
                        <?php if($project->convert_type=='single-project'): ?>
                            <span class="badge badge-info">Single</span>
                        <?php else: ?> 
                            <span class="badge badge-info">Milestone</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($project->hasRequirement->priority); ?></td>
                    <td>$<?php echo e(number_format($project->haveProjectDetails->sum('total_cost'), 2)); ?></td>
                    <td><?php echo e($project->haveProjectDetails->sum('timeframe')); ?> days</td>
                    <td><?php echo e(date('d, M-Y', strtotime($project->created_at))); ?></td>
                    <td>
                        <?php if($project->status!=0): ?>
                            <?php echo e(date('d, M-Y', strtotime($project->updated_at))); ?>

                        <?php else: ?> 
                            --
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($project->status==0): ?>
                            <span class="badge badge-warning">Pending</span>
                        <?php elseif($project->status==1): ?>
                            <span class="badge badge-info">Started</span>
                        <?php elseif($project->status==2): ?>
                            <span class="badge badge-success">Completed</span>
                        <?php elseif($project->status==2): ?>
                            <span class="badge badge-danger">Cancelled</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button class="btn btn-success btn-sm show-project-details-btn" value="<?php echo e($project->id); ?>"><i class="fa fa-eye"></i> Show</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/activity/client-projects.blade.php ENDPATH**/ ?>