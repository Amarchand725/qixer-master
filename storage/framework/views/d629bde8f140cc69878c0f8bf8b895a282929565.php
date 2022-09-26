<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?php echo e(route('admin.home')); ?>">
                <?php if(get_static_option('site_admin_dark_mode') == 'off'): ?>
                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                <?php else: ?>
                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                <?php endif; ?>
            </a>
        </div>
    </div>

    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="<?php echo e(active_menu('admin-home')); ?>">
                        <a href="<?php echo e(route('admin.home')); ?>" aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo app('translator')->get('dashboard'); ?></span>
                        </a>
                    </li>

                    <?php if(auth()->guard('admin')->user()->hasRole('Super Admin')): ?>
                        <li
                            class="
                        <?php echo e(active_menu('admin-home/admin/new')); ?>

                        <?php echo e(active_menu('admin-home/admin/role')); ?>

                        <?php echo e(active_menu('admin-home/admin/all')); ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                                <span><?php echo e(__('Admin Role Manage')); ?></span></a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/admin/all')); ?>"><a
                                        href="<?php echo e(route('admin.all.user')); ?>"><?php echo e(__('All Admin')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/admin/new')); ?>"><a
                                        href="<?php echo e(route('admin.new.user')); ?>"><?php echo e(__('Add New Admin')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/admin/role')); ?> "><a
                                        href="<?php echo e(route('admin.all.admin.role')); ?>"><?php echo e(__('All Admin Role')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user-list', 'user-create'])): ?>
                        <li class="main_dropdown
                        <?php if(request()->is(['admin-home/frontend/new-user', 'admin-home/frontend/all-user', 'admin-home/frontend/all-user/role','admin-home/frontend/deactive-users'])): ?> active <?php endif; ?>
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                                <span><?php echo e(__('Users Manage')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/frontend/all-user')); ?>"><a
                                            href="<?php echo e(route('admin.all.frontend.user')); ?>"><?php echo e(__('All Users')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/frontend/deactive-users')); ?>">
                                        <a href="<?php echo e(route('admin.all.frontend.deactive.user')); ?>"><?php echo e(__('Deactive Users')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['blog-list', 'blog-tag-list', 'blog-create', 'blog-trashed-list',
                        'blog-details'])): ?>
                        <li
                            class=" <?php echo e(active_menu('admin-home/blog')); ?>

                            <?php if(request()->is(['admin-home/blog/*', 'admin-home/blog-category', 'admin-home/blog-tags'])): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-comment-alt"></i>
                                <span><?php echo e(__('Blogs')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/blog')); ?> <?php if(request()->is('admin-home/blog-edit/*')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.blog')); ?>"><?php echo e(__('All Blogs')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-tag-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/blog-tags')); ?>"><a
                                            href="<?php echo e(route('admin.blog.tags')); ?>"><?php echo e(__('Tags')); ?></a></li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/blog/new')); ?>">
                                        <a href="<?php echo e(route('admin.blog.new')); ?>"><?php echo e(__('Add New Post')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-trashed-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/blog/trashed')); ?>"><a
                                            href="<?php echo e(route('admin.blog.trashed')); ?>"><?php echo e(__('All Trashed Items')); ?></a></li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-detail-setting')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/blog/blog-details-settings')); ?>"><a
                                        href="<?php echo e(route('admin.blog.details.settings')); ?>"><?php echo e(__('Blog Details Settings')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['pages-list', 'pages-create'])): ?>
                        <li
                            class="<?php echo e(active_menu('admin-home/dynamic-page')); ?>

                        <?php echo e(active_menu('admin-home/dynamic-page/new')); ?>

                        <?php if(request()->is('admin-home/page-edit/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span><?php echo e(__('Pages')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/dynamic-page')); ?> <?php if(request()->is('admin-home/dynamic-page/edit/*')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.page')); ?>"><?php echo e(__('All Pages')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/dynamic-page/new')); ?>"><a
                                            href="<?php echo e(route('admin.page.new')); ?>"><?php echo e(__('Add New Page')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['slider-list'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/category')); ?>

                        <?php if(request()->is('admin-home/slider/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-mobile"></i>
                                <span><?php echo e(__('Mobile Settings')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/slider/add-new-slider')); ?> <?php if(request()->is('admin-home/slider/edit-slider/*')): ?> active <?php endif; ?>"><a
                                         href="<?php echo e(route('admin.slider.new')); ?>"><?php echo e(__('Slider Settings')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['requirement-list', 'requirement-create'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/requirement')); ?>

                        <?php if(request()->is('admin-home/requirement/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-view-list"></i>
                                <span><?php echo e(__('Requirements')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('requirement-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/requirement')); ?> <?php if(request()->is('admin-home/requirement/edit/*')): ?> active <?php endif; ?>"><a
                                                href="<?php echo e(route('admin.requirement')); ?>"><?php echo e(__('All Requirements')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('requirement-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/requirement/new')); ?>"><a
                                                href="<?php echo e(route('admin.requirement.new')); ?>"><?php echo e(__('Add New Requirement')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li class="<?php echo e(active_menu('admin-home/project')); ?>

                            <?php if(request()->is('admin-home/project/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-view-list"></i>
                                <span><?php echo e(__('Projects')); ?></span></a>
                                <ul class="collapse">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project-list')): ?>
                                        <li class="<?php echo e(active_menu('admin-home/project')); ?> <?php if(request()->is('admin-home/project/edit/*')): ?> active <?php endif; ?>">
                                            <a href="<?php echo e(route('admin.project')); ?>"><?php echo e(__('All Projects')); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['category-list', 'category-create'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/category')); ?>

                    <?php if(request()->is('admin-home/category/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-view-list"></i>
                                <span><?php echo e(__('Categories')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/category')); ?> <?php if(request()->is('admin-home/category/edit/*')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.category')); ?>"><?php echo e(__('All Categories')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/category/new')); ?>"><a
                                            href="<?php echo e(route('admin.category.new')); ?>"><?php echo e(__('Add New Category')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['subcategory-list', 'subcategory-create'])): ?>
                        <li
                            class="<?php echo e(active_menu('admin-home/subcategory')); ?>

                    <?php if(request()->is('admin-home/subcategory/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-cta-right"></i>
                                <span><?php echo e(__('Sub Category')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subcategory-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/subcategory')); ?> <?php if(request()->is('admin-home/location/edit/*')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.subcategory')); ?>"><?php echo e(__('All Sub Category')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subcategory-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/subcategory/new')); ?>"><a
                                            href="<?php echo e(route('admin.subcategory.new')); ?>"><?php echo e(__('Add New Subcategory')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['brand-list', 'brand-create'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/brand')); ?>

                    <?php if(request()->is('admin-home/brand/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dropbox"></i>
                                <span><?php echo e(__('Brands')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand-list')): ?>
                                    <li class="<?php if(request()->is('admin-home/brand')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.brand')); ?>"><?php echo e(__('All Brands')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/brand/add')); ?> <?php if(request()->is('admin-home/brand/add')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.brand.add')); ?>"><?php echo e(__('Add New Brand')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['country-list', 'country-create'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/country')); ?>

                    <?php if(request()->is('admin-home/country/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-flag-alt"></i>
                                <span><?php echo e(__('Service Country')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('country-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/city')); ?> <?php if(request()->is('admin-home/country')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.country')); ?>"><?php echo e(__('All Country')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('country-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/country/add')); ?> <?php if(request()->is('admin-home/country/add')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.country.add')); ?>"><?php echo e(__('Add New country')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['city-list', 'city-create'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/city')); ?>

                    <?php if(request()->is('admin-home/city/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-arrow-circle-right"></i>
                                <span><?php echo e(__('Service City')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('city-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/city')); ?> <?php if(request()->is('admin-home/city')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.city')); ?>"><?php echo e(__('All Cities')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('city-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/city/add')); ?> <?php if(request()->is('admin-home/city/add')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.city.add')); ?>"><?php echo e(__('Add New City')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['area-list', 'area-create'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/area')); ?>

                            <?php if(request()->is('admin-home/area/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-back-right"></i>
                                <span><?php echo e(__('Service Area')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/area')); ?> <?php if(request()->is('admin-home/area')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.area')); ?>"><?php echo e(__('All Areas')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area-create')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/area/add')); ?> <?php if(request()->is('admin-home/area/add')): ?> active <?php endif; ?>"><a
                                            href="<?php echo e(route('admin.area.add')); ?>"><?php echo e(__('Add New Area')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['service-list'])): ?>
                        <li
                            class=" <?php echo e(active_menu('admin-home/services')); ?>

                            <?php if(request()->is(['admin-home/services/*','admin-home/services/service-book-settings','admin-home/services/service-details-settings','admin-home/services/service-create-settings'])): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-list-ol"></i>
                                <span><?php echo e(__('Services')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/services')); ?> <?php if(request()->is('admin-home/services')): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('admin.services')); ?>"><?php echo e(__('All Services')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-book-setting')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/services/service-book-settings')); ?>"><a
                                    href="<?php echo e(route('admin.service.book.settings')); ?>"><?php echo e(__('Service Book Settings')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-detail-setting')): ?>
                                <li class="<?php echo e(active_menu('admin-home/services/service-details-settings')); ?>"><a
                                href="<?php echo e(route('admin.service.details.settings')); ?>"><?php echo e(__('Service Details Settings')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-create-setting')): ?>
                                     <li class="<?php echo e(active_menu('admin-home/services/service-create-settings')); ?>"><a
                                     href="<?php echo e(route('admin.service.create.settings')); ?>"><?php echo e(__('Service Create Settings')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-create-setting')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/services/order-create-settings')); ?>"><a
                                      href="<?php echo e(route('admin.order.create.settings')); ?>"><?php echo e(__('Order Create Settings')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php $pending_order = App\Order::where('status',0)->count() ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['order-list','cancel-order-list','order-success-setting','order-request-complete'])): ?>
                    <li
                        class="<?php echo e(active_menu('admin-home/orders')); ?>

                        <?php if(request()->is(['admin-home/orders','admin-home/orders/cancel-orders','admin-home/orders/order-success-settings','admin-home/orders/order-details*','admin-home/orders/order-request-complete*'])): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-list-ol"></i>
                            <span><?php echo e(__('Orders')); ?></span></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-list')): ?>
                            <li class="<?php echo e(active_menu('admin-home/orders')); ?>">
                                <a href="<?php echo e(route('admin.orders')); ?>"><?php echo e(__('All Orders')); ?>

                                    <?php if($pending_order>=1): ?>
                                    <span class="bage-notification"> <?php echo e($pending_order); ?> </span> 
                                    <?php endif; ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancel-order-list')): ?>
                            <li class="<?php echo e(active_menu('admin-home/orders/cancel-orders')); ?>">
                                <a href="<?php echo e(route('admin.orders.cancel')); ?>"><?php echo e(__('Cancelled Orders')); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-success-setting')): ?>
                            <li class="<?php echo e(active_menu('admin-home/orders/order-success-settings')); ?>">
                                <a href="<?php echo e(route('admin.order.success.settings')); ?>"><?php echo e(__('Order Success Settings')); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-request-complete')): ?>
                                <li class="<?php echo e(active_menu('admin-home/orders/order-request-complete')); ?>">
                                    <a href="<?php echo e(route('admin.order.complete.request')); ?>"><?php echo e(__('Order Request Complete')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('seller-buyer-report')): ?>
                                <li class="<?php echo e(active_menu('admin-home/orders/seller-buyer-report')); ?>">
                                    <a href="<?php echo e(route('admin.order.seller.buyer.report')); ?>"><?php echo e(__('Seller Buyer Report')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('seller-buyer-report')): ?>
                        <li class="<?php echo e(active_menu('admin-home/orders/seller-buyer-report')); ?>">
                            <a href="<?php echo e(route('admin.order.seller.buyer.report')); ?>"><i class="ti-list-ol"></i> <?php echo e(__('Seller Buyer Report')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['ticket-list'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/tickets')); ?>

                                <?php if(request()->is(['admin-home/tickets','admin-home/tickets/ticket-details'])): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-list-ol"></i>
                                <span><?php echo e(__('Tickets')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ticket-list')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/tickets')); ?>">
                                        <a href="<?php echo e(route('admin.tickets.all')); ?>"><?php echo e(__('All Tickets')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['payout-list', 'admin-commission','amount-settings','all-seller'])): ?>
                        <li class="<?php echo e(active_menu('admin-home/area')); ?>

                            <?php if(request()->is('admin-home/seller-settings/*') || request()->is('admin-home/frontend/seller-verify/all')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-back-right"></i>
                                <span><?php echo e(__('Seller Settings')); ?></span></a>
                            <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['payout-list'])): ?>
                                    <li class="<?php echo e(active_menu('admin-home/seller-settings/payout-request/all')); ?>">
                                        <a href="<?php echo e(route('admin.payout.request.all')); ?>" aria-expanded="true"><i class="ti-money"></i><?php echo e(__('Payout Request')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['admin-commission'])): ?>
                                    <li class="<?php echo e(active_menu('admin-home/seller-settings/admin-commission/all')); ?>">
                                        <a href="<?php echo e(route('admin.commission.all')); ?>" aria-expanded="true"><i class="ti-money"></i><?php echo e(__('Admin Commission')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['amount-settings'])): ?>
                                    <li class="<?php echo e(active_menu('admin-home/seller-settings/amount-settings/all')); ?>">
                                        <a href="<?php echo e(route('admin.amount.settings')); ?>" aria-expanded="true"><i class="ti-money"></i><?php echo e(__('Amount Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['all-seller'])): ?>
                                    <li class="<?php echo e(active_menu('admin-home/frontend/seller-verify/all')); ?>">
                                        <a href="<?php echo e(route('admin.frontend.seller.all')); ?>" aria-expanded="true"><i class="ti-user"></i> <?php echo e(__('All Seller')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('form-builder')): ?>
                        <li class="main_dropdown <?php if(request()->is('admin-home/form-builder/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write mr-2"></i>
                                <?php echo e(__('Form Builder')); ?>

                            </a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/form-builder/all')); ?>">
                                    <a href="<?php echo e(route('admin.form.builder.all')); ?>"><?php echo e(__('All Custom Form')); ?></a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['appearance-media-image-manage', 'appearance-widget-builder',
                        'appearance-menu-list'])): ?>
                        <li
                            class="main_dropdown <?php if(request()->is(['admin-home/topbar-settings', 'admin-home/media-upload/page', 'admin-home/menu', 'admin-home/widgets', 'admin-home/menu-edit/*'])): ?> active
                        <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i>
                                <span><?php echo e(__('Appearance Settings')); ?></span></a>
                            <ul class="collapse">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-media-image-manage')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/media-upload/page')); ?>">
                                        <a href="<?php echo e(route('admin.upload.media.images.page')); ?>" aria-expanded="true">
                                            <?php echo e(__('Media Images Manage')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-widget-builder')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/widgets')); ?>"><a
                                            href="<?php echo e(route('admin.widgets')); ?>"><?php echo e(__('Widget Builder')); ?></a></li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-menu-list')): ?>
                                    <li
                                        class="<?php echo e(active_menu('admin-home/menu')); ?>

                            <?php if(request()->is('admin-home/menu-edit/*')): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('admin.menu')); ?>"><?php echo e(__('Menu Manage')); ?></a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['page-settings-404-page-manage', 'page-settings-maintain-page-manage'])): ?>
                        <li class="main_dropdown
                        <?php if(request()->is(['admin-home/contact-page/*', 'admin-home/404-page-manage', 'admin-home/maintains-page/settings'])): ?> active <?php endif; ?> ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-panel"></i>
                                <span><?php echo e(__('Other Page Settings')); ?></span></a>
                            <ul class="collapse">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-404-page-manage')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/404-page-manage')); ?>">
                                        <a href="<?php echo e(route('admin.404.page.settings')); ?>"><?php echo e(__('404 Page Manage')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-maintain-page-manage')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/maintains-page/settings')); ?>">
                                        <a
                                            href="<?php echo e(route('admin.maintains.page.settings')); ?>"><?php echo e(__('Maintain Page Manage')); ?></a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['general-settings-reading-settings', 'general-settings-global-navbar-settings',
                        'general-settings-global-footer-settings', 'general-settings-site-identity',
                        'general-settings-basic-settings', 'general-settings-color-settings',
                        'general-settings-typography-settings', 'general-settings-seo-settings',
                        'general-settings-third-party-scripts', 'general-settings-email-template',
                        'general-settings-email-settings', 'general-settings-smtp-settings', 'general-settings-custom-css',
                        'general-settings-custom-js', 'general-settings-licence-settings',
                        'general-settings-cache-settings','database-upgrade'])): ?>
                        <li class="<?php if(request()->is('admin-home/general-settings/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                                <span><?php echo e(__('General Settings')); ?></span></a>
                            <ul class="collapse ">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-reading-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/reading')); ?>"><a
                                            href="<?php echo e(route('admin.general.reading')); ?>"><?php echo e(__('Reading')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-global-navbar-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/global-variant-navbar')); ?>"><a
                                            href="<?php echo e(route('admin.general.global.variant.navbar')); ?>"><?php echo e(__('Navbar Global Variant')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-global-footer-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/global-variant-footer')); ?>"><a
                                            href="<?php echo e(route('admin.general.global.variant.footer')); ?>"><?php echo e(__('Footer Global Variant')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-payment-gateway')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/payment-gateway-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.global.payment.settings')); ?>"><?php echo e(__('Payment Gateway Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-site-identity')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/site-identity')); ?>"><a
                                            href="<?php echo e(route('admin.general.site.identity')); ?>"><?php echo e(__('Site Identity')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-basic-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/basic-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.basic.settings')); ?>"><?php echo e(__('Basic Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-color-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/color-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.color.settings')); ?>"><?php echo e(__('Color Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-typography-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/typography-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.typography.settings')); ?>"><?php echo e(__('Typography Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-seo-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/seo-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.seo.settings')); ?>"><?php echo e(__('SEO Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-third-party-scripts')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/scripts')); ?>"><a
                                            href="<?php echo e(route('admin.general.scripts.settings')); ?>"><?php echo e(__('Third Party Scripts')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-email-template')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/email-template')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.template')); ?>"><?php echo e(__('Email Template')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-email-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/email-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.settings')); ?>"><?php echo e(__('Email Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-smtp-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/smtp-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.smtp.settings')); ?>"><?php echo e(__('SMTP Settings')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-custom-css')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/custom-css')); ?>"><a
                                            href="<?php echo e(route('admin.general.custom.css')); ?>"><?php echo e(__('Custom CSS')); ?></a></li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-custom-js')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/custom-js')); ?>"><a
                                            href="<?php echo e(route('admin.general.custom.js')); ?>"><?php echo e(__('Custom JS')); ?></a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-licence-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/gdpr-setting')); ?>"><a
                                            href="<?php echo e(route('admin.general.gdpr.settings')); ?>"><?php echo e(__('Gdpr Settings')); ?></a>
                                   
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-licence-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/license-setting')); ?>"><a
                                            href="<?php echo e(route('admin.general.license.settings')); ?>"><?php echo e(__('Licence Settings')); ?></a>
                                   
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-cache-settings')): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/cache-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.cache.settings')); ?>"><?php echo e(__('Cache Settings')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('database-upgrade')): ?>
                                 <li class="<?php echo e(active_menu('admin-home/general-settings/database-upgrade')); ?>"><a
                                        href="<?php echo e(route('admin.general.database.upgrade')); ?>"><?php echo e(__('Database Upgrade')); ?></a>
                                  </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language-list')): ?>
                        <li class="<?php if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages')): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('admin.languages')); ?>" aria-expanded="true"><i class="ti-signal"></i>
                                <span><?php echo e(__('Languages')); ?></span></a>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>