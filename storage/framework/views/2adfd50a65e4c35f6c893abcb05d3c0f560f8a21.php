<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Requirements')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/common/css/flatpickr.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.seller-buyer-preloader','data' => []]); ?>
<?php $component->withName('frontend.seller-buyer-preloader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

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
                <?php echo $__env->make('frontend.user.buyer.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> <?php echo e(__('Requirements')); ?> </h2>
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
                        <form action="<?php echo e(route('admin.project.new')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                        
                            <input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo e($requirement->id); ?>">
                            <input type="hidden" id="project-convert-type" name="convert_type" value="<?php echo e($convert_type); ?>">
                            <div class="modal-body">
                                <h4>Requirement </h4>
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="requirement_name">Requirement Name</label>
                                        <input type="text" class="form-control" readonly name="requirement_name" required value="<?php echo e($requirement->requirement_name); ?>">
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="contact_mobile">Contact Mobile</label>
                                        <input type="text" class="form-control" readonly name="contact_mobile" required value="<?php echo e($requirement->contact_mobile); ?>">
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="contact_email">Contact Email</label>
                                        <input type="text" class="form-control" readonly name="contact_email" required value="<?php echo e($requirement->contact_email); ?>">
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="details">Details</label>
                                        <textarea name="details" id="details" readonly class="form-control"><?php echo e($requirement->details); ?></textarea>
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <label for="notes">Comments</label>
                                        <textarea name="notes" id="notes" readonly class="form-control"><?php echo e($requirement->notes); ?></textarea>
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <?php if($requirement->attachments): ?>
                                            <label for="notes">Attachments</label>
                                            <ul>
                                                <?php $counter = 1; ?> 
                                                <?php $__currentLoopData = $requirement->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(asset('requirements')); ?>/<?php echo e($attachment); ?>" download><i class="fa fa-download"></i> Download Attachment - <?php echo e($counter++); ?></a>    
                                                    </li>   
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <?php if($requirement->deliveries): ?>
                                            <label for="notes">Deliveries</label>
                                            <ul>
                                                <?php $counter = 1; ?> 
                                                <?php $__currentLoopData = $requirement->deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(asset('requirements')); ?>/<?php echo e($delivery); ?>" download><i class="fa fa-download"></i> Download Attachment - <?php echo e($counter++); ?></a>    
                                                    </li>   
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-6  mt-2">
                                        <?php if($requirement->contract): ?>
                                            <label for="notes">Contract</label>
                                            <ul>
                                                <?php $counter = 1; ?> 
                                                <?php $__currentLoopData = $requirement->contract; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(asset('requirements')); ?>/<?php echo e($contract_val); ?>" download><i class="fa fa-download"></i> Download Attachment - <?php echo e($counter++); ?></a>    
                                                    </li>   
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if($convert_type=='single-project'): ?>
                                    <h4 class="mt-4">Single Project </h4>
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <label for="name">Project Name <span class="text-danger">*</span></label>
                                            <input type="text" id="name" readonly value="<?php echo e($requirement->hasProject->hasProjectDetail->name); ?>" class="form-control" required name="name" placeholder="Enter project name">
                                            <span class="text-danger" id="error-name"><?php echo e($errors->first('name')); ?></span>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label for="timeframe">Timeframe (days) <span class="text-danger">*</span></label>
                                            <input type="number" readonly id="timeframe" value="<?php echo e($requirement->hasProject->hasProjectDetail->timeframe); ?>" class="form-control" required name="timeframe" placeholder="Enter project timeframe">
                                            <span class="text-danger" id="error-timeframe"><?php echo e($errors->first('timeframe')); ?></span>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label for="total_cost">Price <span class="text-danger">*</span></label>
                                            <input type="text" readonly id="total_cost" value="<?php echo e($requirement->hasProject->hasProjectDetail->total_cost); ?>" class="form-control" required name="total_cost" placeholder="Enter price">
                                            <span class="text-danger" id="error-total_cost"><?php echo e($errors->first('total_cost')); ?></span>
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label for="service_provider">Service Provider <span class="text-danger">*</span></label>
                                            <select disabled name="service_provider_id" id="service_provider_id" required class="form-control">
                                                <option value="" selected>Select service provider</option>
                                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($seller->id); ?>" <?php echo e($requirement->hasProject->service_provider_id==$seller->id?'selected':''); ?>><?php echo e($seller->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger" id="error-service_provider"><?php echo e($errors->first('service_provider_id')); ?></span>
                                        </div>
                                        <?php if($requirement->hasProject->hasProjectDetail): ?>
                                            <div class="col-sm-12  mt-2">
                                                <label for="notes">Exist Attachment</label>
                                                <a href="<?php echo e(asset('assets/backend/project-attachments')); ?>/<?php echo e($requirement->hasProject->hasProjectDetail->attachment); ?>" download><i class="fa fa-download"></i> Download Attachment </a>    
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-sm-6 mt-2">
                                            <label for="status">Status</label>
                                            <select disabled name="status" id="status" class="form-control">
                                                <option value="0" selected>Pending</option>
                                                <option value="1" <?php echo e($requirement->hasProject->hasProjectDetail->status==1?'selected':''); ?>>Started</option>
                                                <option value="2" <?php echo e($requirement->hasProject->hasProjectDetail->status==2?'selected':''); ?>>Completed</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label for="description">Description</label>
                                            <textarea readonly name="description" id="description" class="form-control" cols="30" rows="5" placeholder="Enter description"><?php echo e($requirement->hasProject->hasProjectDetail->description); ?></textarea>
                                            <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                                        </div>
                                    </div>
                                <?php else: ?> 
                                    <h4 class="mt-4">Milestone Project </h4>
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <label for="number_of_milestone">Number of milestones <span class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" value="<?php echo e(sizeof($requirement->hasProject->haveProjectDetails)); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('number_of_milestone')); ?></span>
                                        </div>
                                    </div>
                                    <span id="milestones">
                                        <?php $counter = 1; ?> 
                                        <?php $__currentLoopData = $requirement->hasProject->haveProjectDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row mt-2">
                                                <div class="col-sm-12 mt-2"><label for=""><u><i class="fa fa-right-arrow"></i> Milestone.No#. <?php echo e($counter++); ?></u></label></div>
                                                <div class="col-sm-12 mt-2">
                                                    <label for="milestone">Milestone Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="milestone" readonly class="form-control" name="milestone_names[]" value="<?php echo e($project->name); ?>" required placeholder="Enter milestone name">
                                                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="milestone_cost">Milestone Price($) <span class="text-danger">*</span></label>
                                                    <input type="number" readonly id="milestone_cost" class="form-control milestone_cost" value="<?php echo e($project->total_cost); ?>" required name="milestone_costs[]" placeholder="Enter milestone cost">
                                                    <span class="text-danger"><?php echo e($errors->first('milestone_cost')); ?></span>
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="milestone_service_provider">Milestone Service Provider <span class="text-danger">*</span></label>
                                                    <select disabled name="milestone_service_providers[]" id="milestone_service_provider" required class="form-control">
                                                        <option value="" selected>Select service provider</option>
                                                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($seller->id); ?>" <?php echo e($project->service_provider_id==$seller->id?'selected':''); ?>><?php echo e($seller->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo e($errors->first('milestone_service_provider')); ?></span>
                                                </div>
                                                <?php if($project->attachment): ?>
                                                    <div class="col-sm-12  mt-2">
                                                        <label for="notes">Exist Attachment</label>
                                                        <a href="<?php echo e(asset('assets/backend/milestone-attachments')); ?>/<?php echo e($project->attachment); ?>" download><i class="fa fa-download"></i> Download Attachment </a>    
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="milestone_timeframe">Timeframe (days)<span class="text-danger">*</span></label>
                                                    <input type="number" readonly value="<?php echo e($project->timeframe); ?>" id="milestone_timeframe" required class="form-control" name="milestone_timeframes[]" placeholder="Enter timeframe (days)">
                                                    <span class="text-danger"><?php echo e($errors->first('milestone_timeframe')); ?></span>
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="mile_status">Status</label>
                                                    <select disabled name="milestone_statuses[]" id="mile_status" class="form-control">
                                                        <option value="0" selected>Pending</option>
                                                        <option value="1" <?php echo e($project->status==1?'selected':''); ?>>Started</option>
                                                        <option value="2" <?php echo e($project->status==1?'selected':''); ?>>Completed</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <label for="milestone_description">Description</label>
                                                    <textarea readonly name="milestone_descriptions[]" id="milestone_description" class="form-control" cols="30" rows="5" placeholder="Enter milestone_description"></textarea>
                                                    <span class="text-danger"><?php echo e($errors->first('milestone_description')); ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </span>
                                <?php endif; ?>
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
    
<?php $__env->stopSection(); ?>  

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/requirements/show.blade.php ENDPATH**/ ?>