<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Requirement')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title"><?php echo e(__('Edit Requirement')); ?>   </h4>
                            </div>
                            <div class="right-content">
                                <a class="btn btn-info btn-sm"
                                   href="<?php echo e(route('admin.requirement')); ?>"><?php echo e(__('All Requirements')); ?></a>
                            </div>
                        </div>
                        <form action="<?php echo e(route('admin.requirement.edit',$requirement->id)); ?>" method="post"
                              enctype="multipart/form-data" id="edit_requirement_form">
                            <?php echo csrf_field(); ?>

                            <div class="tab-content margin-top-40">

                                <div class="form-group">
                                    <label for="requirement_name"><?php echo e(__('Requirement Name')); ?></label>
                                    <input type="text" class="form-control" name="requirement_name" id="requirement_name"
                                           value="<?php echo e($requirement->requirement_name); ?>" placeholder="<?php echo e(__('Requirement Name')); ?>">
                                </div>

                                <div class="form-group permalink_label">
                                    <label class="text-dark"><?php echo e(__('Permalink * : ')); ?>

                                        <span id="slug_show" class="display-inline"></span>
                                        <span id="slug_edit" class="display-inline">
                                             <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                         class="fas fa-edit"></i> </button>
                                            
                                            <input type="text" name="slug" class="form-control requirement_slug mt-2"
                                                   value="<?php echo e($requirement->slug); ?>" style="display: none">
                                            <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                    style="display: none"><?php echo e(__('Update')); ?></button>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="client_id"><?php echo e(__('Client')); ?></label>
                                    <select class="form-control" name="client_id" id="client_id">
                                        <option value="<?php echo e($requirement->client_id); ?>"><?php echo e($requirement->client->name); ?></option>
                                        <optgroup label="Clients">
                                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="project_manager_id"><?php echo e(__('Project Manager')); ?></label>
                                    <select class="form-control" name="project_manager_id" id="project_manager_id">
                                        <option value="<?php echo e($requirement->project_manager_id); ?>"><?php echo e($requirement->project_manager->name); ?></option>
                                        <optgroup label="Project Manager">
                                            <?php $__currentLoopData = $project_managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($project_manager->id); ?>"><?php echo e($project_manager->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="contact_email"><?php echo e(__('Contact Email')); ?></label>
                                    <input type="email" class="form-control" name="contact_email" id="contact_email"
                                           value="<?php echo e($requirement->contact_email); ?>" placeholder="<?php echo e(__('Email')); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="contact_mobile"><?php echo e(__('Contact Phone')); ?></label>
                                    <input type="tel" class="form-control" name="contact_mobile" id="contact_mobile"
                                           value="<?php echo e($requirement->contact_mobile); ?>" placeholder="<?php echo e(__('Phone Number')); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="details"><?php echo e(__('Requirement Details')); ?></label>
                                    <textarea class="form-control" name="details" id="details"
                                              value="<?php echo e($requirement->details); ?>" cols="15" rows="5"><?php echo e($requirement->details); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="notes"><?php echo e(__('Notes')); ?></label>
                                    <textarea class="form-control" name="notes" id="notes"
                                              value="<?php echo e($requirement->notes); ?>" cols="15" rows="5"><?php echo e($requirement->notes); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="budget"><?php echo e(__('Budget')); ?></label>
                                    <input type="text" class="form-control" name="budget" id="budget"
                                           value="<?php echo e($requirement->budget); ?>" placeholder="<?php echo e(__('Budget')); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="priority"><?php echo e(__('Priority')); ?></label>
                                    <select class="form-control" name="priority" id="priority" >
                                        <option value="<?php echo e($requirement->priority); ?>"><?php echo e($requirement->priority); ?></option>
                                        <optgroup label="Priority">
                                            <option value="High">High</option>
                                            <option value="Low">Low</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="attachments"><?php echo e(__('Attachments')); ?></label>
                                    <input type="file" class="form-control" name="attachments[]" id="attachments" multiple>
                                </div>

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

                                <div class="form-group mt-5">
                                    <label for="deliveries"><?php echo e(__('Deliveries')); ?></label>
                                    <input type="file" class="form-control" name="deliveries[]" id="deliveries" multiple>
                                </div>

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

                                <div class="form-group mt-5">
                                    <label for="contract"><?php echo e(__('Contract')); ?></label>
                                    <input type="file" class="form-control" name="contract[]" id="contract" multiple>
                                </div>

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

                                <button type="submit" class="btn btn-primary mt-3 submit_btn"><?php echo e(__('Submit ')); ?></button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        <
        x - icon - picker / >
    </script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                //Permalink Code
                var sl = $('.requirement_slug').val();
                var url = `<?php echo e(url('/service-list/requirement/')); ?>/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

                function converToSlug(slug) {
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    //remove multiple space to single
                    finalSlug = slug.replace(/  +/g, ' ');
                    // remove all white spaces single or multiple spaces
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.requirement_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.requirement_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `<?php echo e(url('/service-list/requirement/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.requirement_slug').val(slug)
                    $('.requirement_slug').hide();
                });

            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?> 



<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/backend/pages/requirement/edit_requirement.blade.php ENDPATH**/ ?>