<aside class="main-sidebar main-sidebar-custom elevation-4  {{ auth()->user()->theme_mode == 1 ? 'sidebar-dark-primary' : 'sidebar-dark-primary' }}">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link {{ auth()->user()->theme_mode == 1 ? 'bg-white' : '' }}">
        <img src="{{ asset('img/logo.png') }}" alt="Logo"
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
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>

            </li>
            <?php
            $subMenu = ['user.index', 'user.create', 'user.edit'];
            ?>
            <li class="nav-item">
                <a href="{{ route('user.index') }}"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>Users</p>
                </a>
            </li>
            <?php
            $subMenu = ['slider.index', 'slider.create', 'slider.edit'];
            ?>
            <li class="nav-item">
                <a href="{{ route('slider.index') }}"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
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

            <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                <a href="#"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
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
                        <a href="{{ route('activity-category.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Activity Category</p>
                        </a>
                    </li>
                    <?php
                    $subSubMenu = ['activity.index','activity.create','activity.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('activity.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Activity</p>
                        </a>
                    </li>
                </ul>
            </li>

            <?php
            $subMenu = [
                'home-backend.index',
                'home-backend-video.edit',
                'home-backend-video.update',
                'home-backend.wcu',
                'home-backend.wcu.create',
                'home-backend.wcu.edit',
                'services.index',
                'services.create',
                'services.edit',
                'client-feedback.index',
                'client-feedback.crate',
                'client-feedback.edit',
                'how-it-works.index',
                'how-it-works.create',
                'how-it-works.edit',
            ];
            ?>
            <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                <a href="#"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home Page
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <?php
                    $subSubMenu = ['home-backend.index','home-backend-video.edit','home-backend-video.update'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('home-backend.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Home Page Video</p>
                        </a>
                    </li>
                    <?php
                    $subSubMenu = ['home-backend.wcu','home-backend.wcu.create', 'home-backend.wcu.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('home-backend.wcu') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Why Choose Us</p>
                        </a>
                    </li>
                    <?php
                    $subSubMenu = ['services.index','services.create', 'services.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('services.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Services</p>
                        </a>
                    </li>

                    <?php
                    $subSubMenu = [
                        'how-it-works.index',
                        'how-it-works.create',
                        'how-it-works.edit',
                    ];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('how-it-works.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>How It works</p>
                        </a>
                    </li>

                    <?php
                    $subSubMenu = ['client-feedback.index','client-feedback.crate', 'client-feedback.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('client-feedback.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Client Feedback</p>
                        </a>
                    </li>
                </ul>
            </li>


            <?php
            $subMenu = [
                'service.index','service.create','service.edit',
                'service-details.index','service-details.create', 'service-details.edit'
            ];
            ?>
            <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                <a href="#"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                        Services
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <?php
                    $subSubMenu = ['service.index', 'service.create', 'service.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('service.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Services</p>
                        </a>
                    </li>

                    <?php
                    $subSubMenu = ['service-details.index','service-details.create', 'service-details.edit'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('service-details.index') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Service Details</p>
                        </a>
                    </li>
                </ul>
            </li>

                <?php
                $subMenu = [
                    'about-us','management.message','contact-us'
                ];
            ?>

            <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                <a href="#"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
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
                        <a href="{{ route('about-us') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>About {{ config('app.name') }}</p>
                        </a>
                    </li>
                    <?php
                    $subSubMenu = ['contact-us'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('contact-us') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Contact Us</p>
                        </a>
                    </li>
                    <?php
                    $subSubMenu = ['management.message'];
                    ?>
                    <li class="nav-item">
                        <a href="{{ route('management.message') }}"
                           class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
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
            <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
            <a href="#"
               class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
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
                    <a href="{{ route('background') }}"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                        <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Background</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['vision'];
                ?>
                <li class="nav-item">
                    <a href="{{ route('vision') }}"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                        <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Vision</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['mission'];
                ?>
                <li class="nav-item">
                    <a href="{{ route('mission') }}"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                        <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Mission</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['objectives'];
                ?>
                <li class="nav-item">
                    <a href="{{ route('objectives') }}"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                        <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Objectives</p>
                    </a>
                </li>
                <?php
                $subSubMenu = ['legal-status'];
                ?>
                <li class="nav-item">
                    <a href="{{ route('legal-status') }}"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                        <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
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
                    <a href="{{ route('executive-committees.index') }}"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                        <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Executive Committee</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organogram') }}"
                       class="nav-link {{ Route::currentRouteName() == 'organogram' ? 'active' : '' }}">
                        <i class="far  {{ Route::currentRouteName() == 'organogram' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
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
                    <a href="{{ route('team-members.index') }}"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                        <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Team Members</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('working-area') }}"
                       class="nav-link {{ Route::currentRouteName() == 'working-area' ? 'active' : '' }}">
                        <i class="far  {{ Route::currentRouteName() == 'working-area' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Working Area</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('at-a-glance') }}"
                       class="nav-link {{ Route::currentRouteName() == 'at-a-glance' ? 'active' : '' }}">
                        <i class="far  {{ Route::currentRouteName() == 'at-a-glance' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
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
            <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                <a href="#"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
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
                    @php
                        $programCategories = \App\Models\ProgramCategory::orderBy('sort')->get();
                    @endphp
                    @foreach($programCategories as $programCategory)
                        <li class="nav-item">
                            <a href="{{ route('programs.index',['program_category'=>$programCategory->id]) }}"
                               class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) && $programCategory->id == request('program_category') ? 'active' : '' }}">
                                <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) && $programCategory->id == request('program_category') ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                <p><small>{{ $programCategory->name }}</small></p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

        <?php
            $subSubMenu = ['contact-information.edit'];
            ?>
            <li class="nav-item">
                <a href="{{ route('contact-information.edit') }}"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>Contact Information</p>
                </a>

            </li>
            <?php
            $subSubMenu = ['customer.index','customer.create','customer.edit'];
            ?>
            <li class="nav-item">
                <a href="{{ route('customer.index') }}"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Partners</p>
                </a>

            </li>
            <?php
            $subSubMenu = ['news.index','news.create','news.edit'];
            ?>
            <li class="nav-item">
                <a href="{{ route('news.index') }}"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>News & Events</p>
                </a>

            </li>
            <?php
                $subSubMenu = ['story.index','story.create','story.edit'];
            ?>
            <li class="nav-item">
                <a href="{{ route('story.index') }}"
                   class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
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

            <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                    <a href="#"
                       class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
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
                            <a href="{{ route('gallery.index') }}"
                               class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Image Gallery</p>
                            </a>
                        </li>
                        <?php
                        $subSubMenu = ['video-gallery.index','video-gallery.create','video-gallery.edit'];
                        ?>
                        <li class="nav-item">
                            <a href="{{ route('video-gallery.index') }}"
                               class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-video"></i>
                                <p>Video Gallery</p>
                            </a>
                        </li>

                    </ul>
                </li>



             <li class="nav-item">
                    <a href="{{ route('contact-message.index') }}"
                       class="nav-link {{ Route::currentRouteName() == 'contact-message.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>Message Inbox</p>
                    </a>

                </li>
              <li class="nav-item">
                    <a href="{{ route('signup-user.index') }}"
                       class="nav-link {{ Route::currentRouteName() == 'signup-user.index' ? 'active' : '' }}">
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
        <a href="{{ route('home') }}" target="_blank" class="btn btn-link"><i class="fas fa-eye"></i> Website</a>
        <a href="{{ route('dark_mode_change') }}" class="btn {{ auth()->user()->theme_mode == 1 ? 'btn-dark bg-gradient-dark' : 'btn-default bg-gradient-white' }}  hide-on-collapse pos-right">
            {{ auth()->user()->theme_mode == 1 ? 'Dark' : 'Light' }}
        </a>
    </div>
</aside>
