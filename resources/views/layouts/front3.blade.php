<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- #required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- #favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- #title -->
    <title>@yield('title') | {{ config('app.name') }}</title>
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
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/default-theme.css') }}" id="switch-color">
    <!-- template settings css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/template-settings.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/main.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/responsive.css') }}">
    <!-- sticky header css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/sticky-header.css') }}">
    <!-- box layout css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/box-layout.css') }}">
    <!-- dark mode css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/dark-mode.css') }}">
    <!-- rtl version css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/assets/css/rtl-version.css') }}">
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
    @yield('style')
</head>
<body>
@php

 $contactInformation = \App\Models\ContactInformation::first();
 $companyInformation = \App\Models\CompanyInformation::first();
 $latestNews = \App\Models\News::latest()->take(1)->with('attachments')->get();
@endphp
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
        <p>{{ config('app.name') }}</p>
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
                                        <li><a href="tel:{{ $contactInformation->mobile_no ?? '' }}"><i class="ph ph-phone-call"></i>{{ $contactInformation->mobile_no ?? '' }}</a>
                                        </li>
                                        <li><a href="mailto:{{ $contactInformation->email ?? '' }}"><i
                                                    class="ph ph-envelope-simple"></i>{{ $contactInformation->email ?? '' }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="topbar__items d-flex align-items-center justify-content-end flex-wrap">
                                    <div class="social topbar__social-menu">
                                        <a href="{{ $contactInformation->facebook_url ?? '#' }}" target="_blank" aria-label="share us on facebook"
                                           title="facebook">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                        <a href="{{ $contactInformation->x_url ?? '#' }}" target="_blank" aria-label="share us on X" title="X">
                                            <i class="fa-brands fa-x"></i>
                                        </a>
                                        <a href="{{ $contactInformation->whatsapp_no ?? '#' }}" target="_blank" aria-label="share us on whatsapp"
                                           title="linkedin">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                        <a href="{{ $contactInformation->linkedin_url ?? '#' }}" target="_blank" aria-label="share us on linkedin"
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
                                <a href="{{ route('home') }}">
                                    <img style="min-height: 90px" src="{{ asset('img/logo.png') }}" alt="Image">
                                </a>
                            </div>
                            <div class="navbar__menu d-none d-xl-block">
                                <ul class="navbar__list">
                                    <li class="navbar__item nav-fade">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">AboutUs</a>
                                        <ul class="navbar__sub-menu">
                                            <li>
                                                <a href="{{ route('about_us') }}">About {{ config('app.name') }}</a>
                                            </li>
                                            <li><a href="{{ route('chairman-message') }}">Chairman Massage</a></li>
                                            <li><a href="{{ route('managing-director-message') }}">Managing Director</a></li>
                                        </ul>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">Activities</a>
                                        <ul class="navbar__sub-menu">
                                            @foreach(\App\Models\ActivityCategory::where('status',1)->orderBy('sort')->get() as $activityCategory)
                                                <li><a href="{{ route('activity-show',['slug'=>$activityCategory->slug]) }}">{{ $activityCategory->name }}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">Who We Are</a>
                                        <ul class="navbar__sub-menu">
                                            <li><a href="{{ route('background.show') }}">Background</a></li>
                                            <li><a href="{{ route('vision-mission-objectives') }}">Vision, Mission & Objectives</a></li>
                                            <li><a href="{{ route('legal-status.page') }}">Legal Status</a></li>
                                            <li><a href="{{ route('executive-committees') }}">Executive Committee</a></li>
                                            <li><a href="{{ route('organogram.page') }}">Organogram</a></li>
                                            <li><a href="{{ route('team-members') }}">Our Team Members</a></li>
                                            <li><a href="{{ route('working-area.page') }}">Working Area</a></li>
                                            <li><a href="{{ route('at-a-glance.page') }}">At a Glance</a></li>
                                        </ul>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="#" aria-label="dropdown menu"
                                           class="navbar__dropdown-label dropdown-label-alter">What We Do</a>
                                        <ul class="navbar__sub-menu">
                                            @foreach(\App\Models\ProgramCategory::where('status',1)->orderBy('sort')->get() as $programCategory)
                                                <li class="navbar__item navbar__item--has-children">
                                                    <a aria-label="dropdown menu"
                                                       class="navbar__dropdown-label navbar__dropdown-label-sub">{{ $programCategory->name }}</a>
                                                    <ul class="navbar__sub-menu navbar__sub-menu__nested">
                                                        @php
                                                            $programs = \App\Models\Program::where('status',1)->where('program_category_id',$programCategory->id)->get()
                                                        @endphp
                                                        @foreach($programs as $program)
                                                            <li>
                                                                <a href="{{ route('program-show',['slug'=>$program->slug]) }}">{{ $program->title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="{{ route('news-and-events') }}">News & Events</a>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="{{ route('contact_us') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar__options">
                                <div class="navbar__mobile-options ">
                                    <a href="{{ route('donation') }}" class="btn--secondary d-none d-md-flex" data-text="Donate Now"><span>Donate
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
                    <a href="{{ route('home') }}" aria-label="home page" title="logo">
                        <img src="{{ asset('img/logo.png') }}" alt="Image">
                    </a>
                </div>
                <button aria-label="close mobile menu" class="close-mobile-menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="mobile-menu__list"></div>
            <div class="mobile-menu__cta nav-fade d-block d-md-none">
                <a href="{{ route('donation') }}" class="btn--secondary" data-text="Donate Now"><span>Donate
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
                            <img src="{{ asset('themes/frontend/assets/images/shop/cart-one.png') }}" alt="Image">
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
                            <img src="{{ asset('themes/frontend/assets/images/shop/cart-two.png') }}" alt="Image">
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

    @yield('content')
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
                            <a href="{{ route('home') }}">
                                <img style="height: 100px" src="{{ asset('img/logo.png') }}" alt="Image">
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
                                <li><a href="{{ route('about-us') }}"><i class="fa-solid fa-angle-right"></i> About Us</a>
                                </li>
                                <li><a href="{{ route('donation') }}"><i class="fa-solid fa-angle-right"></i>
                                        Donate Us</a>
                                </li>

                                <li><a href="{{ route('news-and-events') }}"><i class="fa-solid fa-angle-right"></i>News & Events</a></li>
                                <li><a href="{{ route('contact_us') }}"><i class="fa-solid fa-angle-right"></i>Contact Us</a></li>
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
                            @foreach($latestNews as $latestNewsItem)
                                <div class="footer__blog-single">
                                    <div class="thumb">
                                        <a href="{{ route('news-and-events.show',['slug'=>$latestNewsItem->id]) }}">
                                            <img src="{{ $latestNewsItem->attachments->first()->file ?? '' }}" alt="Image">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h6><a href="{{ route('news-and-events.show',['slug'=>$latestNewsItem->id]) }}">
                                                {{ $latestNewsItem->title }}
                                            </a>
                                        </h6>
                                        <p>{{ $latestNewsItem->created_at->format('F l, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
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
                                        {{ $contactInformation->address ?? '' }}
                                    </a>
                                </li>
                                <li><a href="tel:{{ $contactInformation->mobile_no ?? '' }}"><i class="fa-solid fa-phone-flip"></i>{{ $contactInformation->mobile_no ?? '' }}</a>
                                </li>
                                <li><a href="mailto:{{ $contactInformation->email ?? '' }}"><i class="fa-regular fa-envelope"></i>{{ $contactInformation->email ?? '' }}</a></li>
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
                                                href="{{ route('home') }}">{{ config('app.name') }}</a>.
                                            All rights
                                            reserved. Developed by <a target="_blank"
                                                href="https://2aitlimited.com/">2a IT Limited</a>.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="footer__bottom-right">
                                        <div class="social justify-content-center justify-content-lg-end">
                                            <a href="{{ $contactInformation->facebook_url ?? '#' }}" target="_blank" aria-label="share us on facebook"
                                               title="facebook">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a href="{{ $contactInformation->x_url ?? '#' }}" target="_blank" aria-label="share us on twitter" title="twitter">
                                                <i class="fa-brands fa-x"></i>
                                            </a>
                                            <a href="{{ $contactInformation->whatsapp_no ?? '#' }}" target="_blank" aria-label="share us on whatsapp" title="whatsapp">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>
                                            <a href="{{ $contactInformation->linkedin_url ?? '#' }}" target="_blank" aria-label="share us on linkedin"
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
            <img src="{{ asset('themes/frontend/assets/images/sprade.png') }}" alt="Image" class="base-img">
        </div>
        <div class="sprade-light" data-aos="zoom-in" data-aos-duration="1000">
            <img src="{{ asset('themes/frontend/assets/images/sprade-light.png') }}" alt="Image">
        </div>
        <div class="footer__thumb-right" data-aos="fade-left" data-aos-duration="1000">
            <img src="{{ asset('themes/frontend/assets/images/mask/footer-right.png') }}" alt="Image">
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
<script src="{{ asset('themes/frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
<!-- bootstrap five js -->
<script src="{{ asset('themes/frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('themes/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
<!-- magnific popup js -->
<script src="{{ asset('themes/frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- swiper slider js -->
<script src="{{ asset('themes/frontend/assets/js/swiper-bundle.min.js') }}"></script>
<!-- viewport js -->
<script src="{{ asset('themes/frontend/assets/js/viewport.jquery.js') }}"></script>
<!-- odometer js -->
<script src="{{ asset('themes/frontend/assets/js/odometer.min.js') }}"></script>
<!-- vanilla tilt js -->
<script src="{{ asset('themes/frontend/assets/js/vanilla-tilt.min.js') }}"></script>
<!-- aos js -->
<script src="{{ asset('themes/frontend/assets/js/aos.js') }}"></script>
<!-- phospor icons js -->
<script src="{{ asset('themes/frontend/assets/js/phosphor-icon.js') }}"></script>
<!-- splittext js -->
<script src="{{ asset('themes/frontend/assets/js/SplitText.min.js') }}"></script>
<!-- scrollto js -->
<script src="{{ asset('themes/frontend/assets/js/ScrollToPlugin.min.js') }}"></script>
<!-- scrolltrigger js -->
<script src="{{ asset('themes/frontend/assets/js/ScrollTrigger.min.js') }}"></script>
<!-- gsap js -->
<script src="{{ asset('themes/frontend/assets/js/gsap.min.js') }}"></script>
<!-- ==== / js dependencies end ==== -->
<!-- template settings js -->
<script src="{{ asset('themes/frontend/assets/js/template-settings.js') }}"></script>
<!-- main js -->
<script src="{{ asset('themes/frontend/assets/js/custom.js') }}"></script>
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
                url: "{{ route('signup') }}",
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

@yield('script')
</body>
</html>
