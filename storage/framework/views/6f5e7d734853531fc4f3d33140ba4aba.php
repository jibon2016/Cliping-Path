<aside class="main-sidebar main-sidebar-custom elevation-4  <?php echo e(auth()->user()->theme_mode == 1 ? 'sidebar-dark-primary' : 'sidebar-dark-primary'); ?>">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link <?php echo e(auth()->user()->theme_mode == 1 ? 'bg-white' : ''); ?>">
        <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text"><b>Admin</b>Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>

        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent text-sm" data-widget="treeview"
                role="menu"
                data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?php echo e(route('dashboard')); ?>"
                   class="nav-link <?php echo e(Route::currentRouteName() == 'dashboard' ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>

            </li>
            <?php
            $subMenu = ['user.index', 'user.create', 'user.edit'];
            ?>
            <li class="nav-item">
                <a href="<?php echo e(route('user.index')); ?>"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>Users</p>
                </a>
            </li>
            <?php
            $subMenu = ['slider.index', 'slider.create', 'slider.edit'];
            ?>
            <li class="nav-item">
                <a href="<?php echo e(route('slider.index')); ?>"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-image"></i>
                    <p>Sliders</p>
                </a>
            </li>

            <?php
            $subMenu = [
                'activity-category.index','activity-category.create','activity-category.edit',
                'activity.index','activity.create','activity.edit'
            ];
            ?>

            <li class="nav-item <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : ''); ?>">
                <a href="#"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Activity
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <?php
                    $subSubMenu = ['activity-category.index','activity-category.create','activity-category.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('activity-category.index')); ?>"
                           class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                            <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                            <p>Activity Category</p>
                        </a>
                    </li>
                    <?php
                    $subSubMenu = ['activity.index','activity.create','activity.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('activity.index')); ?>"
                           class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                            <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                            <p>Activity</p>
                        </a>
                    </li>
                </ul>
            </li>


            <?php
                $subMenu = [
                    'about-us','management.message',
                ];
            ?>

            <li class="nav-item <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : ''); ?>">
                <a href="#"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-info"></i>
                    <p>
                        About Us
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <?php
                    $subSubMenu = ['about-us'];
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('about-us')); ?>"
                           class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                            <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                            <p>About <?php echo e(config('app.name')); ?></p>
                        </a>
                    </li>
                    <?php
                    $subSubMenu = ['management.message'];
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('management.message')); ?>"
                           class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                            <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                            <p>Management Massage</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php
            $subMenu = [
                'background','vision','mission','objectives','legal-status',
                'working-area','at-a-glance','organogram',
                'executive-committees.index',
                'executive-committees.create',
                'executive-committees.edit',
                'team-members.index',
                'team-members.create',
                'team-members.edit',
            ];
            ?>
            <li class="nav-item <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : ''); ?>">
            <a href="#"
               class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-info"></i>
                <p>
                    Who We Are
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <?php
                $subSubMenu = ['background'];
                ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('background')); ?>"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Background</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['vision'];
                ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('vision')); ?>"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Vision</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['mission'];
                ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('mission')); ?>"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Mission</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['objectives'];
                ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('objectives')); ?>"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Objectives</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['legal-status'];
                ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('legal-status')); ?>"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Legal Status</p>
                    </a>
                </li>

                <?php
                $subSubMenu = [
                    'executive-committees.index',
                    'executive-committees.create',
                    'executive-committees.edit',
                ];
                ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('executive-committees.index')); ?>"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Executive Committee</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('organogram')); ?>"
                       class="nav-link <?php echo e(Route::currentRouteName() == 'organogram' ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(Route::currentRouteName() == 'organogram' ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Organogram</p>
                    </a>
                </li>
                <?php
                    $subSubMenu = [
                            'team-members.index',
                            'team-members.create',
                            'team-members.edit',
                            ];
                ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('team-members.index')); ?>"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Team Members</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('working-area')); ?>"
                       class="nav-link <?php echo e(Route::currentRouteName() == 'working-area' ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(Route::currentRouteName() == 'working-area' ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>Working Area</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('at-a-glance')); ?>"
                       class="nav-link <?php echo e(Route::currentRouteName() == 'at-a-glance' ? 'active' : ''); ?>">
                        <i class="far  <?php echo e(Route::currentRouteName() == 'at-a-glance' ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                        <p>At a Glance</p>
                    </a>
                </li>
            </ul>
        </li>
            <?php
                $subMenu = [
                    'programs.index',
                    'programs.create',
                    'programs.edit',];
            ?>
            <li class="nav-item <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : ''); ?>">
                <a href="#"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-info"></i>
                    <p>
                        What We Do
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <?php
                    $subSubMenu = [
                        'programs.index',
                        'programs.create',
                        'programs.edit',
                    ];
                    ?>
                    <?php
                        $programCategories = \App\Models\ProgramCategory::orderBy('sort')->get();
                    ?>
                    <?php $__currentLoopData = $programCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('programs.index',['program_category'=>$programCategory->id])); ?>"
                               class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) && $programCategory->id == request('program_category') ? 'active' : ''); ?>">
                                <i class="far  <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) && $programCategory->id == request('program_category') ? 'fa-check-circle' : 'fa-circle'); ?> nav-icon"></i>
                                <p><small><?php echo e($programCategory->name); ?></small></p>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>

        <?php
            $subSubMenu = ['contact-information.edit'];
            ?>
            <li class="nav-item">
                <a href="<?php echo e(route('contact-information.edit')); ?>"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>Contact Information</p>
                </a>

            </li>
            <?php
            $subSubMenu = ['customer.index','customer.create','customer.edit'];
            ?>
            <li class="nav-item">
                <a href="<?php echo e(route('customer.index')); ?>"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Partners</p>
                </a>

            </li>
            <?php
            $subSubMenu = ['news.index','news.create','news.edit'];
            ?>
            <li class="nav-item">
                <a href="<?php echo e(route('news.index')); ?>"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>News & Events</p>
                </a>

            </li>
            <?php
                $subSubMenu = ['story.index','story.create','story.edit'];
            ?>
            <li class="nav-item">
                <a href="<?php echo e(route('story.index')); ?>"
                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>Success Story</p>
                </a>

            </li>

                <?php
                $subMenu = [
                    'gallery.index','gallery.create','gallery.edit',
                    'video-gallery.index','video-gallery.create','video-gallery.edit'
                ];
                ?>

            <li class="nav-item <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : ''); ?>">
                    <a href="#"
                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subMenu) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Gallery
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php
                        $subSubMenu = ['gallery.index','gallery.create','gallery.edit'];
                        ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('gallery.index')); ?>"
                               class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Image Gallery</p>
                            </a>
                        </li>
                        <?php
                        $subSubMenu = ['video-gallery.index','video-gallery.create','video-gallery.edit'];
                        ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('video-gallery.index')); ?>"
                               class="nav-link <?php echo e(in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-file-video"></i>
                                <p>Video Gallery</p>
                            </a>
                        </li>

                    </ul>
                </li>



             <li class="nav-item">
                    <a href="<?php echo e(route('contact-message.index')); ?>"
                       class="nav-link <?php echo e(Route::currentRouteName() == 'contact-message.index' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>Message Inbox</p>
                    </a>

                </li>
              <li class="nav-item">
                    <a href="<?php echo e(route('signup-user.index')); ?>"
                       class="nav-link <?php echo e(Route::currentRouteName() == 'signup-user.index' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Signup Users </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
        <a href="<?php echo e(route('home')); ?>" target="_blank" class="btn btn-link"><i class="fas fa-eye"></i> Website</a>
        <a href="<?php echo e(route('dark_mode_change')); ?>" class="btn <?php echo e(auth()->user()->theme_mode == 1 ? 'btn-dark bg-gradient-dark' : 'btn-default bg-gradient-white'); ?>  hide-on-collapse pos-right">
            <?php echo e(auth()->user()->theme_mode == 1 ? 'Dark' : 'Light'); ?>

        </a>
    </div>
</aside>
<?php /**PATH D:\PHP-8.2.4\htdocs\clipping\resources\views/layouts/partial/__main_sidebar.blade.php ENDPATH**/ ?>