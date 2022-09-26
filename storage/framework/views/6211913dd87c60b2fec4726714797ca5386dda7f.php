<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
        <?php if($convert_type=='single-project'): ?>
            Single Project Details
        <?php else: ?> 
            Milestone Project Details
        <?php endif; ?>
    </h5>
</div>
<form action="<?php echo e(route('admin.project.new')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo e($requirement->id); ?>">
    <input type="hidden" id="project-convert-type" name="convert_type" value="<?php echo e($convert_type); ?>">
    <div class="modal-body">
        <h4>Requirement </h4>
        <div class="row mt-4">
            <div class="col-sm-12">
                <label for="requirement_name">Requirement Name</label>
                <input type="text" class="form-control" name="requirement_name" required value="<?php echo e($requirement->requirement_name); ?>">
            </div>
            <div class="col-sm-6  mt-2">
                <label for="contact_mobile">Contact Mobile</label>
                <input type="text" class="form-control" name="contact_mobile" required value="<?php echo e($requirement->contact_mobile); ?>">
            </div>
            <div class="col-sm-6  mt-2">
                <label for="contact_email">Contact Email</label>
                <input type="text" class="form-control" name="contact_email" required value="<?php echo e($requirement->contact_email); ?>">
            </div>
            <div class="col-sm-6  mt-2">
                <label for="budget">Budget</label>
                <input type="text" class="form-control" name="budget" required value="<?php echo e($requirement->budget); ?>">
            </div>
            <div class="col-sm-6  mt-2">
                <label for="priority">Priority</label>
                <input type="text" class="form-control" name="priority" required value="<?php echo e($requirement->priority); ?>">
            </div>
            <div class="col-sm-6  mt-2">
                <label for="details">Details</label>
                <textarea name="details" id="details" class="form-control"><?php echo e($requirement->details); ?></textarea>
            </div>
            <div class="col-sm-6  mt-2">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-control"><?php echo e($requirement->notes); ?></textarea>
            </div>
            <div class="col-sm-6  mt-2">
                <label for="notes">Attachments</label>
                <?php if($requirement->attachments): ?>
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
                <label for="notes">Deliveries</label>
                <?php if($requirement->deliveries): ?>
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
                <label for="notes">Contract</label>
                <?php if($requirement->contract): ?>
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
                    <input type="text" id="name" class="form-control" required name="name" placeholder="Enter project name">
                    <span class="text-danger" id="error-name"><?php echo e($errors->first('name')); ?></span>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="timeframe">Timeframe <span class="text-danger">*</span></label>
                    <input type="number" id="timeframe" class="form-control" required name="timeframe" placeholder="Enter project timeframe">
                    <span class="text-danger" id="error-timeframe"><?php echo e($errors->first('timeframe')); ?></span>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="total_cost">Total Cost <span class="text-danger">*</span></label>
                    <input type="text" id="total_cost" class="form-control" required name="total_cost" placeholder="Enter Total Cost">
                    <span class="text-danger" id="error-total_cost"><?php echo e($errors->first('total_cost')); ?></span>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="service_provider">Service Provider <span class="text-danger">*</span></label>
                    <select name="service_provider_id" id="service_provider_id" required class="form-control">
                        <option value="" selected>Select service provider</option>
                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($seller->id); ?>"><?php echo e($seller->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="text-danger" id="error-service_provider"><?php echo e($errors->first('service_provider_id')); ?></span>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="service_provider_cost">Service Provider/ Seller Cost <span class="text-danger">*</span></label>
                    <input type="text" id="service_provider_cost" required class="form-control" name="service_provider_cost" placeholder="Enter service provider seller cost">
                    <span class="text-danger"><?php echo e($errors->first('service_provider_cost')); ?></span>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="attachment">Attachment <span class="text-danger">*</span></label>
                    <input type="file" name="attachment" required id="attachment" class="form-control">
                    <span class="text-danger" id="error-attachment"><?php echo e($errors->first('attachment')); ?></span>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" selected>Pending</option>
                        <option value="1">Started</option>
                        <option value="2">Completed</option>
                    </select>
                </div>
                <div class="col-sm-12 mt-2">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="5" placeholder="Enter description"></textarea>
                    <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                </div>
            </div>
        <?php else: ?> 
            <h4 class="mt-4">Milestone Project </h4>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <label for="number_of_milestone">Number of milestones <span class="text-danger">*</span></label>
                    <select name="number_of_milestone" id="number_of_milestone" class="form-control">
                        <option value="" selected>Select number of milstone</option>
                        <?php for($i=1; $i<=5; $i++): ?>
                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endfor; ?>
                    </select>
                    <span class="text-danger"><?php echo e($errors->first('number_of_milestone')); ?></span>
                </div>
            </div>
            <span id="milestones"></span>
        <?php endif; ?>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/backend/pages/ajax/project/add_project.blade.php ENDPATH**/ ?>