<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content="Image Editing Company - 2D/3D Ecommerce Image Editing Agency" name="title">
    <meta content="Leading 2D/3D Ecommerce Image Editing Agency. Transform your visuals with expert image editing services." name="description">
    <meta property="og:title" content="Image Editing Company - 2D/3D Ecommerce Image Editing Agency" />
    <meta property="og:description" content="Leading 2D/3D Ecommerce Image Editing Agency. Transform your visuals with expert image editing services." />
    <meta content="" name="keywords">
    <meta name="google-site-verification" content="rNyNkYKhPCdZfA_gtAZbd0XRJQOvxdb1Dk3g0tLPltg" />
    <!-- Favicons -->
    <link rel="icon" href="{{asset('themes/frontend/assets/images/logo/favicon.png')}}" type="image/png" sizes="any">
    <link rel="icon" href="{{asset('themes/frontend/assets/images/logo/favicon.png')}}" type="image/svg+xml">

    <link href="{{asset('themes/frontend/assets/css/css/twentytwenty.css')}}" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/icomoon.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    <!-- CSS -->
{{--    <link href="{{asset('themes/frontend/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">--}}

    <!-- CSS -->
    <link href="{{asset('themes/frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/bootstrap-grid.min.css')}}" type="text/css')"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preload" href="{{asset('themes/frontend/assets/css/vertical-rhythm.min.css')}}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/vertical-rhythm.min.css')}}">
    <link rel="preload" href="{{asset('themes/frontend/assets/css/magnific-popup.css')}}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/magnific-popup.css')}}">
    <link rel="preload" href="{{asset('themes/frontend/assets/css/owl.carousel.css')}}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/owl.carousel.css')}}">
    <link rel="preload" href="{{asset('themes/frontend/assets/css/splitting.css')}}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/splitting.css')}}">

    @stack('style')

    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/hero-sub.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/ai-human.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/faq.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/style-responsive.css')}}">

    <!-- Link to Lottie library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.8/lottie.min.js"></script>
    <script type="module" src="https://unpkg.com/@dotlottie/player-component@2.3.0/dist/dotlottie-player.mjs" ></script>

    <style>
        :root {
            --color-primary-1: #4477a7;
            --primary-color: #3c578a;
            --color-primary-1-a: #343d76;
            --color-primary-light-1-a: #4f97c1;

            --gradient-primary-x: linear-gradient(90deg, #0952a2 0%, #A1479A 33%, #04A9DF 67%, #0857be 100%);
        }
        .credits, a {
            color: #0284ff;
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .inner-nav ul li {
            margin: 0 18px;
            padding: 6px 0px 21px 0px;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        .circle_prev_one {
            width: 20px;
            height: 20px;
            background: rgba(255,255,255,0.5);
            border-radius: 50%;
            top: 20%;
            left: 10%;
        }

        .circle_prev_two {
            width: 30px;
            height: 30px;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            top: 60%;
            left: 80%;
        }

        .circle_prev_three {
            width: 15px;
            height: 15px;
            background: rgba(255,255,255,0.4);
            border-radius: 50%;
            top: 80%;
            left: 20%;
        }

    </style>
    @yield('style')
</head>

<body class="appear-animate">

<!-- Page Loader -->
<div class="page-loader">
    <div class="loader">Loading...</div>
</div>
<!-- End Page Loader -->

<!-- Skip to Content -->
<a href="#main" class="btn skip-to-content">Skip to Content</a>
<!-- End Skip to Content -->

<!-- Page Wrap -->
<div class="page" id="top">
    <!-- Navigation Panel -->
    <nav class="main-nav transparent stick-fixed wow-menubar wch-unset">
        <div class="main-nav-sub container">
            <div class="nav-logo-wrap position-static local-scroll">
                <div class="top__bar__logo">
                    <a href="{{route('home')}}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                        <img src="{{asset('img/logo.png')}}" style="height:75px;width:100px;margin-top: -42px;">
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="mobile-nav" role="button" tabindex="0">
                <i class="mobile-nav-icon"></i>
                <span class="visually-hidden">Menu</span>
            </div>

            <!-- Main Menu -->
            <div class="inner-nav desktop-nav">
                <ul class="clearlist local-scroll">
                    <li><a class="" href="{{route('about_us')}}">About Us</a></li>
                    <li>
                        <a href="{{route('services')}}" class="mn-has-sub " id="sub-service">Services <i class="fas fa-chevron-down"></i></a>
                        <div id="mega-menu" class="d-none d-lg-block d-xl-block">
                            <ul class="mn-sub servicemenu to-left" id="service-menu">
                                @php
                                    $services = \App\Models\Service::where('status', 1)->orderBy('id')->get();
                                @endphp
                                @foreach($services as $service)
                                    <li>
                                        <a href="{{route('services.all', ['service' => $service->slug])}}">
{{--                                            <img src="{{asset($service->icon)}}" alt="{{ $service->title }}">--}}
                                            <p class="submenu-text">{{ $service->title }}</p>
                                        </a>
                                    </li>
                                @endforeach
{{--                                <li>--}}
{{--                                    <a href="{{route('services.all', ['service' => 'clipping-path'])}}">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}">--}}
{{--                                        <p class="submenu-text">Clipping Path</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/Background-Remove.svg')}}">--}}
{{--                                        <p class="submenu-text">Background Removal</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{route('services.all', ['service' => 'photo-retouching'])}}">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/Photo-Retouch.svg')}}">--}}
{{--                                        <p class="submenu-text">Photo Retouching</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/Color-Adjustment.svg')}}">--}}
{{--                                        <p class="submenu-text">Color Adjustment</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/Ghost-Mannequin.svg')}}">--}}
{{--                                        <p class="submenu-text">Ghost Mannequin</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/Shdow-Creation.svg')}}">--}}
{{--                                        <p class="submenu-text">Shadow Creation</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/Product-Photo-Editing.svg')}}">--}}
{{--                                        <p class="submenu-text">Product Photo Editing</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/Video-Editing.svg')}}">--}}
{{--                                        <p class="submenu-text">Video Editing</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/3D-Modeling.svg')}}">--}}
{{--                                        <p class="submenu-text">3D Modeling</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/3D-Rendering.svg')}}">--}}
{{--                                        <p class="submenu-text">3D Rendering</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{route('services')}}">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/select-service.svg')}}">--}}
{{--                                        <p class="submenu-text">All Our Service</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        <img src="{{asset('themes/frontend/assets/images/services/professional_help_.png')}}">--}}
{{--                                        <p class="submenu-text">Try For Free</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
{{--                        <ul class="mn-sub service-mobile to-left  d-md-none">--}}
{{--                            <li>--}}

{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> Background Removal</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> Photo Retouching</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> Color Adjustment</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> Ghost Mannequin</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> Shadow Creation</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> Product Photo Editing</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> Video Editing</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> 3D Modeling</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class=""href="{{asset('themes/frontend/assets/images/services/clipping-path.svg')}}"><i class="fa fa-angle-right"></i> 3D Rendering</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </li>
                    <li><a class="" href="{{route('portfolio')}}">Our Portfolio</a></li>
                    <li><a class="" href="{{route('pricing')}}">Pricing</a></li>
                    <li><a class="" href="{{route('contact_us')}}">Contact Us</a></li>
                    <li class="desktop-nav-display d-none d-lg-block d-xl-block">
                        <div class="vr mt-2"></div>
                    </li>
                    <li class="d-none d-lg-block d-xl-block">
                        <a href="{{route('home')}}" class="opacity-1 no-hover">
                            <span class="btn btn-mod btn-color btn-small btn-circle" data-btn-animate="y">Free Trial</span>
                        </a>
                    </li>
{{--                    <li class="d-none d-lg-block d-xl-block">--}}
{{--                        <a href="https://order.livingcolors.studio/" class="opacity-1 no-hover">--}}
{{--                            <span class="btn btn-mod btn-color btn-small btn-circle" data-btn-animate="y">Order Now</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <!-- End Main Menu -->
        </div>
    </nav>


    <main id="main">
        @yield('content')
        <!-- Hero -->
    </main>
    <!-- End #main -->
    <!-- footer begin -->
    <footer id="footer" class="footer footer-section">
        <div class="footer-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <div style="position: relative;width: 100%;" class="">
                                <div class="loader" id="loader-lottieContainer4" style="display: none;"></div>
                                <div class="small-logo text-center">
                                    <img loading="lazy" src="{{asset('img/logo.png')}}" alt="Colors Logo">
                                </div>
                            </div>
                            <p style="text-align: justify; line-height: 1.2; font-size: 12px; padding: 10px 0;">Since 2015, we have been passionately committed to helping brands grow and succeed. With a skilled team of over 30 editors, we’ve proudly supported more than 100 brands in scaling their vision and achieving their goals over the years.</p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-link no-circle">
                        <h3 class="mb-4">Services</h3>
                        <ul>
                            @foreach($services->take(6) as $service)
                                <li><i class="fas fa-chevron-right"></i>
                                    <a href="{{route('services.all', ['service' => $service->slug])}}">{{ $service->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-link no-circle">
                        <h3 class="mb-4 pt-4"></h3>
                        <ul>
                            @foreach($services->skip(6) as $service)
                                <li><i class="fas fa-chevron-right"></i>
                                    <a href="{{route('services.all', ['service' => $service->slug])}}">{{ $service->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-link no-circle">
                        <h3 class="mb-4">Quick Links</h3>
                        <ul>
                            <li><i class="fas fa-chevron-right"></i> <a href="{{ route('contact_us') }}">Contact Us</a></li>
                            <li><i class="fas fa-chevron-right"></i> <a href="{{ route('about_us') }}">About Us</a></li>
                        </ul>
                    </div>
                    @php
                        $contact = \App\Models\ContactInformation::first();
                    @endphp
                    <div class="col-lg-3 col-md-6 footer-links contact__us">
                        <h3 class="mb-4">Contact Us</h3>
                        <ul>
                            <li class="pb-2">
                                <i class="fas fa-phone"></i>
                                {{ $contact->mobile_no }}
                            </li>
                            <li class="pb-2">
                                <i class="fas fa-paper-plane"></i>
                                {{ $contact->email }}
                            </li>
                            <li class="pb-2">
                                <i class="fas fa-map-marker"></i>
                                {{ $contact->address }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-legal text-left">
                <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                    <div class="credits">
                        <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-of-use.html">Terms of Use </a> | The Clipping © 2025 All rights reserved.
                    </div>
                    <div class="col-lg-3 col-md-12 social-links order-first order-lg-last mb-3 mb-lg-0 text-center social-links-container">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-x-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-11"></div>
                <div class="col-md-1">
                    <!-- Scroll Up -->
                    <div class="local-scroll scroll-up-wrap wow fadeInUp" data-wow-offset="0" >
                        <div class="full-wrapper" style="text-align: right;">
                            <a href="#top" class="scroll-up" style="float: none;">
                                <i class="fas fa-arrow-up size-22"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Scroll Up -->


        </div>


        <!-- Cookie Banner -->
        <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
            🍪 This website uses cookies to ensure you get the best experience on our website.
            <a href="privacy-policy.html" target="blank">Learn more</a>
            <button type="button" class="btn btn-success btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
                I Got It
            </button>
        </div>
        <!-- End of Cookie Banner -->

    </footer>
    <!-- footer close -->    </div>
<!-- End Page Wrap -->
<!-- JS -->


<script src="{{asset('themes/frontend/assets/libs/jquery/3.7.1/jquery.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/jquery.twentytwenty.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/jquery.event.move.js')}}"></script>
<script src="{{asset('themes/frontend/assets/libs/bootstrap/5.3.3/js/bootstrap.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/libs/bodymovin/5.7.8/lottie.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.mb.YTPlayer.js')}}"></script>
{{--<script type="module" src="https://unpkg.com/@dotlottie-playertie/player-component@2.3.0/dist/dotlottie-player.mjs" ></script>--}}
<script src="{{asset('themes/frontend/assets/js/new-isotope.pkgd.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.easing.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.parallax-1.1.3.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.viewport.mini.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-masonry.pkgd.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-morphext.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-rellax.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-SmoothScroll.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.fitvids.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.lazyload.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-jquery.localScroll.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-Magnific-Popup.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-owl.carousel.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-splitting.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-typewrite.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/new-wow.min.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/contact-form.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/all.js')}}"></script>
<script src="{{asset('themes/frontend/assets/js/custom.js')}}"></script>


<!-- End JS -->
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            navigationText: [
                '<i class="fas fa-arrow-left"></i>',
                '<i class="fas fa-arrow-right"></i>'
            ],
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer449089028'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://livingcolors.studio/uploads/home-page/1709102630-65ded626d2239.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer449089028').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1116465637'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://livingcolors.studio/uploads/home-page/1709102790-65ded6c6abcdd.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1116465637').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1084052335'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://livingcolors.studio/uploads/home-page/1709102760-65ded6a88c85b.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1084052335').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1766977791'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://livingcolors.studio/uploads/contact/1707856311-65cbd1b7f2bf6.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1766977791').style.display = 'none');
    });
</script>
@yield('script')

</body>
</html>
