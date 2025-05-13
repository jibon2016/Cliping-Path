<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <!-- #required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- #favicon -->
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <!-- #title -->
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>
    <!-- #keywords -->
    <meta name="keywords" content="charity, nonprofit, fundraising, donation, html, bootstrap, scss">
    <!-- #description -->
    <meta name="description" content="Nonprofit NGO Fundraising HTML5 Template">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&amp;family=Nunito:ital,wght@0,200..1000;1,200..1000&amp;display=swap"
        rel="stylesheet">
    <!-- color themes -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/default-theme.css')); ?>" id="switch-color">
    <!-- template settings css -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/template-settings.css')); ?>">
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/main.css')); ?>">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/responsive.css')); ?>">
    <!-- sticky header css -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/sticky-header.css')); ?>">
    <!-- box layout css -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/box-layout.css')); ?>">
    <!-- dark mode css -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/dark-mode.css')); ?>">
    <!-- rtl version css -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/rtl-version.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <style>
        .gallery-item img {
            width: 100%;
            height: 300px;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .gallery-item img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }
        .popup-link {
            display: block;
            position: relative;
        }
        .popup-link::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .popup-link:hover::after {
            opacity: 1;
        }
        .banner-two .banner-two__slider-single::after {

            opacity:0;
        }

        .header .navbar__sub-menu {
            min-width: 300px;
            max-width: 300px;
        }
        .common-banner {
            padding-top: 138px;
            padding-bottom: 55px;
        }
        .common-banner::before {
            background-color: #607d78;
            opacity: 1;
        }

        .partner-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            text-align: center;
        }
        .partner-card:hover {
            transform: translateY(-5px);
        }
        .partner-card img {
            width: 100%;
            max-width: 120px;
            border-radius: 5px;
        }
        .partner-name {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        @media only screen and (max-width: 767.98px) {
            .header-secondary {
                padding-block: 5px;
            }
            .common-banner {
                padding-top: 18px !important;
                padding-bottom: 59px !important;
            }
        }
        @media only screen and (min-width: 1200px) {
            .section__header h2 {
                font-size: 30px;
                line-height: 30px;
            }
        }

    </style>
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
<?php

 $contactInformation = \App\Models\ContactInformation::first();
 $companyInformation = \App\Models\CompanyInformation::first();
 $latestNews = \App\Models\News::latest()->take(1)->with('attachments')->get();
?>
<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->
<div class="page-wrapper">
    <!-- ==== preloader start ==== -->
    <div class="preloader">
        <i class="icon-donation"></i>
        <p><?php echo e(config('app.name')); ?></p>
    </div>
    <!-- ==== / preloader end ==== -->
    <!-- ==== topbar start ==== -->
    <div class="topbar topbar__secondary d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topbar__inner">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-6">
                                <div class="topbar__list-wrapper">
                                    <ul class="topbar__list">
                                        <li><a href="tel:<?php echo e($contactInformation->mobile_no ?? ''); ?>"><i class="ph ph-phone-call"></i><?php echo e($contactInformation->mobile_no ?? ''); ?></a>
                                        </li>
                                        <li><a href="mailto:<?php echo e($contactInformation->email ?? ''); ?>"><i
                                                    class="ph ph-envelope-simple"></i><?php echo e($contactInformation->email ?? ''); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="topbar__items d-flex align-items-center justify-content-end flex-wrap">
                                    <div class="social topbar__social-menu">
                                        <a href="<?php echo e($contactInformation->facebook_url ?? '#'); ?>" target="_blank" aria-label="share us on facebook"
                                           title="facebook">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                        <a href="<?php echo e($contactInformation->x_url ?? '#'); ?>" target="_blank" aria-label="share us on X" title="X">
                                            <i class="fa-brands fa-x"></i>
                                        </a>
                                        <a href="<?php echo e($contactInformation->whatsapp_no ?? '#'); ?>" target="_blank" aria-label="share us on whatsapp"
                                           title="linkedin">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                        <a href="<?php echo e($contactInformation->linkedin_url ?? '#'); ?>" target="_blank" aria-label="share us on linkedin"
                                           title="linkedin">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== / topbar end ==== -->
    <!-- ==== header start ==== -->
    <header class="header header-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-header__menu-box">
                        <nav class="navbar p-0">
                            <div class="navbar-logo">
                                <a href="<?php echo e(route('home')); ?>">
                                    <img style="min-height: 90px" src="<?php echo e(asset('img/logo.png')); ?>" alt="Image">
                                </a>
                            </div>
                            <div class="navbar__menu d-none d-xl-block">
                                <ul class="navbar__list">
                                    <li class="navbar__item nav-fade">
                                        <a href="<?php echo e(route('home')); ?>">Home</a>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">AboutUs</a>
                                        <ul class="navbar__sub-menu">
                                            <li>
                                                <a href="<?php echo e(route('about_us')); ?>">About <?php echo e(config('app.name')); ?></a>
                                            </li>
                                            <li><a href="<?php echo e(route('chairman-message')); ?>">Chairman Massage</a></li>
                                            <li><a href="<?php echo e(route('managing-director-message')); ?>">Managing Director</a></li>
                                        </ul>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">Activities</a>
                                        <ul class="navbar__sub-menu">
                                            <?php $__currentLoopData = \App\Models\ActivityCategory::where('status',1)->orderBy('sort')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activityCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('activity-show',['slug'=>$activityCategory->slug])); ?>"><?php echo e($activityCategory->name); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">Who We Are</a>
                                        <ul class="navbar__sub-menu">
                                            <li><a href="<?php echo e(route('background.show')); ?>">Background</a></li>
                                            <li><a href="<?php echo e(route('vision-mission-objectives')); ?>">Vision, Mission & Objectives</a></li>
                                            <li><a href="<?php echo e(route('legal-status.page')); ?>">Legal Status</a></li>
                                            <li><a href="<?php echo e(route('executive-committees')); ?>">Executive Committee</a></li>
                                            <li><a href="<?php echo e(route('organogram.page')); ?>">Organogram</a></li>
                                            <li><a href="<?php echo e(route('team-members')); ?>">Our Team Members</a></li>
                                            <li><a href="<?php echo e(route('working-area.page')); ?>">Working Area</a></li>
                                            <li><a href="<?php echo e(route('at-a-glance.page')); ?>">At a Glance</a></li>
                                        </ul>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">What We Do</a>
                                        <ul class="navbar__sub-menu">
                                            <?php $__currentLoopData = \App\Models\ProgramCategory::where('status',1)->orderBy('sort')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="navbar__item navbar__item--has-children">
                                                    <a aria-label="dropdown menu"
                                                       class="navbar__dropdown-label navbar__dropdown-label-sub"><?php echo e($programCategory->name); ?></a>
                                                    <ul class="navbar__sub-menu navbar__sub-menu__nested">
                                                        <?php
                                                            $programs = \App\Models\Program::where('status',1)->where('program_category_id',$programCategory->id)->get()
                                                        ?>
                                                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(route('program-show',['slug'=>$program->slug])); ?>"><?php echo e($program->title); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="<?php echo e(route('news-and-events')); ?>">News & Events</a>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="<?php echo e(route('contact_us')); ?>">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar__options">
                                <div class="navbar__mobile-options ">
                                    <a href="<?php echo e(route('donation')); ?>" class="btn--secondary d-none d-md-flex" data-text="Donate Now"><span>Donate
                                 Now</span></a>
                                </div>
                                <button class="open-offcanvas-nav d-flex d-xl-none" aria-label="toggle mobile menu"
                                        title="open offcanvas menu">
                                    <span class="icon-bar top-bar"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==== / header end ==== -->
    <!-- ==== mobile menu start ==== -->
    <div class="mobile-menu d-block d-xl-none">
        <nav class="mobile-menu__wrapper">
            <div class="mobile-menu__header nav-fade">
                <div class="logo">
                    <a href="<?php echo e(route('home')); ?>" aria-label="home page" title="logo">
                        <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Image">
                    </a>
                </div>
                <button aria-label="close mobile menu" class="close-mobile-menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="mobile-menu__list"></div>
            <div class="mobile-menu__cta nav-fade d-block d-md-none">
                <a href="<?php echo e(route('donation')); ?>" class="btn--secondary" data-text="Donate Now"><span>Donate
                  Now</span></a>
            </div>
            <div class="mobile-menu__social social nav-fade">
                <a href="https://www.facebook.com/" target="_blank" aria-label="share us on facebook" title="facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://x.com/" target="_blank" aria-label="share us on twitter" title="twitter">
                    <i class="fa-brands fa-x"></i>
                </a>
                <a href="https://www.linkedin.com/" target="_blank" aria-label="share us on linkedin" title="linkedin">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            </div>
        </nav>
    </div>
    <div class="mobile-menu__backdrop"></div>
    <!-- ==== / mobile menu end ==== -->
    <!-- ==== search popup start ==== -->
    <div class="search-popup">
        <button class="close-search" aria-label="close search box" title="close search box">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <form action="#" method="post">
            <div class="search-popup__group">
                <input type="text" name="search-field" id="searchField" placeholder="Search...." required>
                <button type="submit" aria-label="search products" title="search products">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>
    <!-- ==== / search popup end ==== -->
    <!-- ==== sidebar cart start ==== -->
    <div class="sidebar-cart">
        <div class="der">
            <button class="close-cart">
                <span class="close-icon">X</span>
            </button>
            <h2>
                Shopping Bag
                <span class="count">2</span>
            </h2>
            <div class="cart-items">
                <div class="cart-item-single">
                    <div class="cart-item-thumb">
                        <a href="event-details.html">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/shop/cart-one.png')); ?>" alt="Image">
                        </a>
                    </div>
                    <div class="cart-item-content">
                        <h6 class="h6 title-anim">
                            <a href="product-single.html">Headset</a>
                        </h6>
                        <p class="price">
                            $
                            <span class="item-price">14.99</span>
                        </p>
                        <div class="measure">
                            <button aria-label="decrease item" class="quantity-decrease">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <span class="item-quantity">0</span>
                            <button aria-label="add item" class="quantity-increase">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button aria-label="delete item" class="delete-item">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <div class="cart-item-single">
                    <div class="cart-item-thumb">
                        <a href="event-details.html">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/shop/cart-two.png')); ?>" alt="Image">
                        </a>
                    </div>
                    <div class="cart-item-content">
                        <h6 class="h6 title-anim">
                            <a href="product-single.html">Headphone</a>
                        </h6>
                        <p class="price">
                            $
                            <span class="item-price">34.99</span>
                        </p>
                        <div class="measure">
                            <button aria-label="decrease item" class="quantity-decrease">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <span class="item-quantity">0</span>
                            <button aria-label="add item" class="quantity-increase">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button aria-label="delete item" class="delete-item">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="totals">
                <div class="subtotal">
                    <span class="label">Subtotal:</span>
                    <span class="amount ">
                     $
                     <span class="total-price">0.00</span>
                     </span>
                </div>
            </div>
            <div class="action-buttons">
                <a class="view-cart-button" href="cart.html" aria-label="go to cart">Cart</a>
                <a class="checkout-button" href="checkout.html" aria-label="go to checkout">
                    Checkout
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="cart-backdrop"></div>
    <!-- ==== / sidebar cart end ==== -->

    <?php echo $__env->yieldContent('content'); ?>
    <!-- ==== footer start ==== -->
    <footer class="footer footer-two pt-120">
        <div class="container">
            <div class="row align-items-center gutter-30">
                <div class="col-12 col-lg-7 col-xxl-6">
                    <div class="footer__newsletter-content">
                        <h3 class="title-animation">
                            Subscribe to Our Newsletter
                        </h3>
                        <p>Regular inspections and feedback mechanisms</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-xxl-5 offset-xxl-1">
                    <div class="footer__newsletter-form">
                        <form action="#" id="signup-form" method="post" name="subscribe_form">
                            <input type="email" required name="email" id="sign_up_email" placeholder="Enter Email">
                            <button type="button" id="btn-signup" aria-label="subscribe to our newsletter" title="subscribe to our newsletter"
                                    class="btn--tertiary"> <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </form>
                        <p class="text-success" style="color: green" id="sign-up-success"></p>
                        <p class="text-danger" style="color: darkred" id="sign-up-error"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr class="divider">
                </div>
            </div>
            <div class="row gutter-60">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="footer__widget" data-aos="fade-up" data-aos-duration="1200">
                        <div class="footer__logo">
                            <a href="<?php echo e(route('home')); ?>">
                                <img style="height: 100px" src="<?php echo e(asset('img/logo.png')); ?>" alt="Image">
                            </a>
                        </div>
                        <div class="footer__widget-content">
                            <p>Welcome to Surjer Alo, a non-profit organization committed to bringing light and hope to those in need. Our mission is to empower underprivileged communities by providing access to education, healthcare, and sustainable development opportunities.</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-2">
                    <div class="footer__widget" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="footer__widget-intro">
                            <h5>Quick Links</h5>
                            <div class="line">
                                <span class="large-line"></span>
                                <span class="small-line"></span>
                                <span class="small-line"></span>
                            </div>
                        </div>
                        <div class="footer__widget-content">
                            <ul class="footer__widget-list">
                                <li><a href="<?php echo e(route('about-us')); ?>"><i class="fa-solid fa-angle-right"></i> About Us</a>
                                </li>
                                <li><a href="<?php echo e(route('donation')); ?>"><i class="fa-solid fa-angle-right"></i>
                                        Donate Us</a>
                                </li>

                                <li><a href="<?php echo e(route('news-and-events')); ?>"><i class="fa-solid fa-angle-right"></i>News & Events</a></li>
                                <li><a href="<?php echo e(route('contact_us')); ?>"><i class="fa-solid fa-angle-right"></i>Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer__widget" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                        <div class="footer__widget-intro">
                            <h5>Top News</h5>
                            <div class="line">
                                <span class="large-line"></span>
                                <span class="small-line"></span>
                                <span class="small-line"></span>
                            </div>
                        </div>
                        <div class="footer__widget-content">
                            <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestNewsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="footer__blog-single">
                                    <div class="thumb">
                                        <a href="<?php echo e(route('news-and-events.show',['slug'=>$latestNewsItem->id])); ?>">
                                            <img src="<?php echo e($latestNewsItem->attachments->first()->file ?? ''); ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h6><a href="<?php echo e(route('news-and-events.show',['slug'=>$latestNewsItem->id])); ?>">
                                                <?php echo e($latestNewsItem->title); ?>

                                            </a>
                                        </h6>
                                        <p><?php echo e($latestNewsItem->created_at->format('F l, Y')); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer__widget" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                        <div class="footer__widget-intro">
                            <h5>Get In Touch</h5>
                            <div class="line">
                                <span class="large-line"></span>
                                <span class="small-line"></span>
                                <span class="small-line"></span>
                            </div>
                        </div>
                        <div class="footer__widget-content">
                            <ul class="footer__contact-list">
                                <li><a
                                        href="https://www.google.com/maps/place/Kentucky,+USA/@37.8172108,-87.087054,8z/data=!3m1!4b1!4m6!3m5!1s0x8842734c8b1953c9:0x771f6f4ec5ccdffc!8m2!3d37.8393332!4d-84.2700179!16zL20vMDQ5OHk?entry=ttu"
                                        target="_blank"><i class="fa-solid fa-location-dot"></i>
                                        <?php echo e($contactInformation->address ?? ''); ?>

                                    </a>
                                </li>
                                <li><a href="tel:<?php echo e($contactInformation->mobile_no ?? ''); ?>"><i class="fa-solid fa-phone-flip"></i><?php echo e($contactInformation->mobile_no ?? ''); ?></a>
                                </li>
                                <li><a href="mailto:<?php echo e($contactInformation->email ?? ''); ?>"><i class="fa-regular fa-envelope"></i><?php echo e($contactInformation->email ?? ''); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer__bottom-inner">
                            <div class="row align-items-center gutter-24">
                                <div class="col-12 col-lg-7">
                                    <div class="footer__bottom-left">
                                        <p class="text-center text-lg-start">Copyright &copy; <span id="copyrightYear"></span> <a
                                                href="<?php echo e(route('home')); ?>"><?php echo e(config('app.name')); ?></a>.
                                            All rights
                                            reserved. Developed by <a target="_blank"
                                                href="https://2aitlimited.com/">2a IT Limited</a>.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="footer__bottom-right">
                                        <div class="social justify-content-center justify-content-lg-end">
                                            <a href="<?php echo e($contactInformation->facebook_url ?? '#'); ?>" target="_blank" aria-label="share us on facebook"
                                               title="facebook">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a href="<?php echo e($contactInformation->x_url ?? '#'); ?>" target="_blank" aria-label="share us on twitter" title="twitter">
                                                <i class="fa-brands fa-x"></i>
                                            </a>
                                            <a href="<?php echo e($contactInformation->whatsapp_no ?? '#'); ?>" target="_blank" aria-label="share us on whatsapp" title="whatsapp">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>
                                            <a href="<?php echo e($contactInformation->linkedin_url ?? '#'); ?>" target="_blank" aria-label="share us on linkedin"
                                               title="linkedin">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sprade" data-aos="zoom-in" data-aos-duration="1000">
            <img src="<?php echo e(asset('themes/frontend/assets/images/sprade.png')); ?>" alt="Image" class="base-img">
        </div>
        <div class="sprade-light" data-aos="zoom-in" data-aos-duration="1000">
            <img src="<?php echo e(asset('themes/frontend/assets/images/sprade-light.png')); ?>" alt="Image">
        </div>
        <div class="footer__thumb-right" data-aos="fade-left" data-aos-duration="1000">
            <img src="<?php echo e(asset('themes/frontend/assets/images/mask/footer-right.png')); ?>" alt="Image">
        </div>
    </footer>
    <!-- ==== / footer end ==== -->
    <!-- ==== custom cursor start ==== -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"></div>
    <!-- ==== / custom cursor end ==== -->
    <!-- ==== scroll to top start ==== -->
    <button class="progress-wrap" aria-label="scroll indicator" title="back to top">
        <span></span>
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </button>

</div>
<!-- ==== js dependencies start ==== -->
<!-- jquery -->
<script src="<?php echo e(asset('themes/frontend/assets/js/jquery-3.7.1.min.js')); ?>"></script>
<!-- bootstrap five js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- nice select js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/jquery.nice-select.min.js')); ?>"></script>
<!-- magnific popup js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/jquery.magnific-popup.min.js')); ?>"></script>
<!-- swiper slider js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/swiper-bundle.min.js')); ?>"></script>
<!-- viewport js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/viewport.jquery.js')); ?>"></script>
<!-- odometer js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/odometer.min.js')); ?>"></script>
<!-- vanilla tilt js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/vanilla-tilt.min.js')); ?>"></script>
<!-- aos js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/aos.js')); ?>"></script>
<!-- phospor icons js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/phosphor-icon.js')); ?>"></script>
<!-- splittext js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/SplitText.min.js')); ?>"></script>
<!-- scrollto js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/ScrollToPlugin.min.js')); ?>"></script>
<!-- scrolltrigger js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/ScrollTrigger.min.js')); ?>"></script>
<!-- gsap js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/gsap.min.js')); ?>"></script>
<!-- ==== / js dependencies end ==== -->
<!-- template settings js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/template-settings.js')); ?>"></script>
<!-- main js -->
<script src="<?php echo e(asset('themes/frontend/assets/js/custom.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#btn-signup').click(function () {
            var formData = new FormData($('#signup-form')[0]);
            $("#sign-up-success").text(' ');
            $("#sign-up-error").text(' ');
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('signup')); ?>",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $("#sign_up_email").val('');
                        $("#sign-up-success").text(response.message);
                    } else {
                        $("#sign-up-error").text(response.message);
                    }
                }
            });
        });

    });

</script>
<script>
    $(document).ready(function() {
        $('.gallery').magnificPopup({
            delegate: '.popup-link',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>

<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/layouts/front.blade.php ENDPATH**/ ?>