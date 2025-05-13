<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>
    <meta content="Image Editing Company - 2D/3D Ecommerce Image Editing Agency" name="title">
    <meta content="Leading 2D/3D Ecommerce Image Editing Agency. Transform your visuals with expert image editing services." name="description">
    <meta property="og:title" content="Image Editing Company - 2D/3D Ecommerce Image Editing Agency" />
    <meta property="og:description" content="Leading 2D/3D Ecommerce Image Editing Agency. Transform your visuals with expert image editing services." />
    <meta content="" name="keywords">
    <meta name="google-site-verification" content="rNyNkYKhPCdZfA_gtAZbd0XRJQOvxdb1Dk3g0tLPltg" />
    <!-- Favicons -->
    <link rel="icon" href="<?php echo e(asset('themes/frontend/assets/images/logo/favicon.png')); ?>" type="image/png" sizes="any">
    <link rel="icon" href="https://cdn.livingcolors.studio/colors/images/logo/favicon.svg" type="image/svg+xml">

    <!-- CSS -->
    <link href="<?php echo e(asset('themes/frontend/assets/dist/css/bootstrap.min.css')); ?>" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS -->
    <link href="<?php echo e(asset('themes/frontend/assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/bootstrap-grid.min.css')); ?>" type="text/css')"/>

    <link rel="preload" href="<?php echo e(asset('themes/frontend/assets/css/vertical-rhythm.min.css')); ?>" as="style" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/vertical-rhythm.min.css')); ?>"></noscript>
    <link rel="preload" href="<?php echo e(asset('themes/frontend/assets/css/magnific-popup.css')); ?>" as="style" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/magnific-popup.css')); ?>"></noscript>
    <link rel="preload" href="<?php echo e(asset('themes/frontend/assets/css/owl.carousel.css')); ?>" as="style" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/owl.carousel.css')); ?>"></noscript>
    <link rel="preload" href="<?php echo e(asset('themes/frontend/assets/css/splitting.css')); ?>" as="style" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/splitting.css')); ?>"></noscript>


    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/style.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/assets/css/style-responsive.css')); ?>">

    <script>
        setTimeout(function() {
            var links = [
                'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;1,200;1,300;1,400;1,600;1,700;1,800&display=swap',
                'themes/frontend/assets/css/icomoon.css'
            ];

            var head = document.head || document.getElementsByTagName('head')[0];
            for (var i = 0; i < links.length; i++) {
                var link = document.createElement('link');
                link.rel = 'stylesheet';
                link.href = links[i];
                head.appendChild(link);
            }
        }, 3000);
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-657306556"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-657306556');
    </script>



    <script>
        /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
        !function(a){"use strict";var b=function(b,c,d){function j(a){if(e.body)return a();setTimeout(function(){j(a)})}function l(){f.addEventListener&&f.removeEventListener("load",l),f.media=d||"all"}var g,e=a.document,f=e.createElement("link");if(c)g=c;else{var h=(e.body||e.getElementsByTagName("head")[0]).childNodes;g=h[h.length-1]}var i=e.styleSheets;f.rel="stylesheet",f.href=b,f.media="only x",j(function(){g.parentNode.insertBefore(f,c?g:g.nextSibling)});var k=function(a){for(var b=f.href,c=i.length;c--;)if(i[c].href===b)return a();setTimeout(function(){k(a)})};return f.addEventListener&&f.addEventListener("load",l),f.onloadcssdefined=k,k(l),f};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
        /*! loadCSS rel=preload polyfill. [c]2017 Filament Group, Inc. MIT License */
        !function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(a){return!1}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d,d.getAttribute("media")),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){b.poly(),a.clearInterval(c)}),a.attachEvent&&a.attachEvent("onload",function(){a.clearInterval(c)})}}}(this);
    </script>
    <?php echo $__env->yieldContent('style'); ?>
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
                    <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                        <div style="width: 80%; margin-left: 0; margin-right: auto;; position: relative; overflow: hidden;" class="">
                            <div class="lottie-loader" id="loader-lottieContainer973158738"></div>
                            <div id="lottieContainer973158738" style="height: 100%; min-height: 100px;"></div>
                        </div>
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
                    <li><a class="" href="<?php echo e(route('about_us')); ?>">About Us</a></li>
                    <li>
                        <a href="<?php echo e(route('services')); ?>" class="mn-has-sub " id="sub-service">Services <i class="icon-chevron-down"></i></a>
                        <div id="mega-menu" class="d-none d-lg-block d-xl-block">
                            <ul class="mn-sub servicemenu to-left" id="service-menu">

                                <li>
                                    <a href="<?php echo e(route('services.clipping')); ?>">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/clipping-path.svg')); ?>">
                                        <p class="submenu-text">Clipping Path</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/Background-Remove.svg')); ?>">
                                        <p class="submenu-text">Background Removal</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/Photo-Retouch.svg')); ?>">
                                        <p class="submenu-text">Photo Retouching</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/Color-Adjustment.svg')); ?>">
                                        <p class="submenu-text">Color Adjustment</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/Ghost-Mannequin.svg')); ?>">
                                        <p class="submenu-text">Ghost Mannequin</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/Shdow-Creation.svg')); ?>">
                                        <p class="submenu-text">Shadow Creation</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/Product-Photo-Editing.svg')); ?>">
                                        <p class="submenu-text">Product Photo Editing</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/Video-Editing.svg')); ?>">
                                        <p class="submenu-text">Video Editing</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/3D-Modeling.svg')); ?>">
                                        <p class="submenu-text">3D Modeling</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/3D-Rendering.svg')); ?>">
                                        <p class="submenu-text">3D Rendering</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('services')); ?>">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/select-service.svg')); ?>">
                                        <p class="submenu-text">All Our Service</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/services/professional_help_.png')); ?>">
                                        <p class="submenu-text">Try For Free</p>
                                    </a>
                                </li>

                            </ul>
                        </div>
































                    </li>
                    <li><a class="" href="<?php echo e(route('portfolio')); ?>">Our Portfolio</a></li>
                    <li><a class="" href="<?php echo e(route('pricing')); ?>">Pricing</a></li>
                    <li><a class="" href="<?php echo e(route('contact_us')); ?>">Contact Us</a></li>
                    <li class="desktop-nav-display d-none d-lg-block d-xl-block">
                        <div class="vr mt-2"></div>
                    </li>
                    <li class="d-none d-lg-block d-xl-block">
                        <a href="<?php echo e(route('home')); ?>" class="opacity-1 no-hover">
                            <span class="btn btn-mod btn-color btn-small btn-circle" data-btn-animate="y">Free Trial</span>
                        </a>
                    </li>





                </ul>
            </div>
            <!-- End Main Menu -->
        </div>
    </nav>


    <main id="main">
        <?php echo $__env->yieldContent('content'); ?>
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
                            <div style="position: relative;width: 70%;" class="">
                                <div class="loader" id="loader-lottieContainer4" style="display: none;"></div>
                                <div class="small-logo">
                                    <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/logo/logo_200.svg" alt="Colors Logo">
                                </div>
                            </div>
                            <span>Since 2001, we've been dedicated to helping brands scale up, boasting a talented team of 200+ editors who have assisted over 9,000 brands throughout the years.</span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-link no-circle">
                        <h3 class="mb-4">Services</h3>
                        <ul>
                            <li><i class="icon-chevron-right"></i>
                                <a href="product-photo-editing.html">Product Photo Editing</a>
                            </li>
                            <li><i class="icon-chevron-right"></i>
                                <a href="photo-retouching.html">Photo Retouching</a>
                            </li>
                            <li><i class="icon-chevron-right"></i>
                                <a href="video-editing.html">Video Editing</a>
                            </li>
                            <li><i class="icon-chevron-right"></i>
                                <a href="3d-modeling.html">3D Modeling</a>
                            </li>
                            <li><i class="icon-chevron-right"></i>
                                <a href="3d-rendering.html">3D Rendering</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-link no-circle">
                        <h3 class="mb-4">Quick Links</h3>
                        <ul>
                            <li><i class="icon-chevron-right"></i><a href="about-us.html">Who We Are</a></li>
                            <li><i class="icon-chevron-right"></i><a href="portfolio.html">Portfolio</a></li>
                            <li><i class="icon-chevron-right"></i><a href="pricing.html">Pricing</a></li>
                            <li><i class="icon-chevron-right"></i><a href="blog/index.html">Blog</a></li>
                            <li><i class="icon-chevron-right"></i><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links contact__us">
                        <h3 class="mb-4">Contact Us</h3>
                        <ul>
                            <li class="pb-2">
                                <i class="icon-phone"></i>
                                +1 (718) 717 2362
                            </li>
                            <li class="pb-2">
                                <i class="icon-paper-plane-o"></i>
                                cs@livingcolors.studio
                            </li>
                            <li class="pb-2">
                                <i class="icon-map-marker"></i>
                                41-44, 75 Street, Elmhurst, New York
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-legal text-left">
                <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                    <div class="credits">
                        Complete content including text and visuals in this website are copyrighted. Without prior consent from The Living Colors Studio Ltd., the information cannot be used by visitors in any manner. <br><a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-of-use.html">Terms of Use </a> | The Living Colors Studio Ltd. is a brand of Tradexcel Graphics © 2023 All rights reserved.
                    </div>
                    <div class="col-lg-3 col-md-12 social-links order-first order-lg-last mb-3 mb-lg-0 text-center social-links-container">
                        <a href="https://www.facebook.com/livingcolorsstudioltd"><i class="icon-facebook"></i></a>
                        <a href="#"><i class="icon-x"></i></a>
                        <a href="https://www.linkedin.com/company/the-living-colors-studio/"><i class="icon-linkedin"></i></a>
                        <a href="https://www.youtube.com/@TheLivingColorsStudio/"><i class="icon-youtube-play"></i></a>

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
                                <i class="icon-arrow-up size-22"></i>
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


<script src="<?php echo e(asset('themes/frontend/assets/libs/jquery/3.7.1/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/libs/bootstrap/5.3.3/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/libs/bodymovin/5.7.8/lottie.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.mb.YTPlayer.js')); ?>"></script>
<script type="module" src="https://unpkg.com/@dotlottie/player-component@2.3.0/dist/dotlottie-player.mjs" ></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.easing.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.parallax-1.1.3.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.scrollTo.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.viewport.mini.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-masonry.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-morphext.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-rellax.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-SmoothScroll.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/jquery.ajaxchimp.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.fitvids.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.lazyload.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-jquery.localScroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-Magnific-Popup.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-splitting.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-typewrite.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/new-wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/contact-form.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/all.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/custom.js')); ?>"></script>
<!-- End JS -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1230005228'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707854734-65cbcb8e3cf39.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1230005228').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer2051087516'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707854765-65cbcbad1eef8.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer2051087516').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1796299251'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1709790727-65e95607f0cc7.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1796299251').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer218079285'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707854828-65cbcbecef191.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer218079285').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer311981722'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707898315-65cc75cbc73d1.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer311981722').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1516693549'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707854921-65cbcc496e121.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1516693549').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1092330179'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707854941-65cbcc5d7b1dc.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1092330179').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1771329429'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707854965-65cbcc75edfa6.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1771329429').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer1824250135'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/services/1707886425-65cc4759292d5.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer1824250135').style.display = 'none');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anim = bodymovin.loadAnimation({
            wrapper: document.getElementById('lottieContainer973158738'),
            animType: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://cdn.livingcolors.studio/uploads/contact/1707856311-65cbd1b7f2bf6.json',
        });
        anim.addEventListener('DOMLoaded', () => document.getElementById('loader-lottieContainer973158738').style.display = 'none');
    });
</script>
<script>








</script>
<script>
    // SessionFlow Tracking Code
    (function() {
        const API_KEY = 'eOFuYsN5MUY2dUCEQHEQIyCZgWZgBQOq';
        const SESSION_ID = generateUUID();
        const VISITOR_ID = getVisitorId();

        // Get or create visitor ID
        function getVisitorId() {
            let visitorId = localStorage.getItem('sessionflow_visitor');
            if (!visitorId) {
                visitorId = generateUUID();
                localStorage.setItem('sessionflow_visitor', visitorId);
            }
            return visitorId;
        }

        // Generate a UUID
        function generateUUID() {
            return 'eOFuYsN5MUY2dUCEQHEQIyCZgWZgBQOq'.replace(/[xy]/g, function(c) {
                const r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        // Start tracking session
        fetch('http://ai.lnk2.im:9020/api/session/start', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                session_id: SESSION_ID,
                visitor_id: VISITOR_ID,
                api_key: API_KEY,
                device: navigator.userAgent,
                browser: navigator.appName,
                os: navigator.platform,
                country: 'auto-detect'
            })
        });

        // Track page view
        function trackPageView() {
            fetch('http://ai.lnk2.im:9020/api/session/event', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    event_type: 'pageview',
                    event_data: {
                        url: window.location.href,
                        title: document.title,
                        referrer: document.referrer
                    },
                    session_id: SESSION_ID,
                    api_key: API_KEY
                })
            });
        }

        // End session when user leaves
        window.addEventListener('beforeunload', function() {
            fetch('http://ai.lnk2.im:9020/api/session/end', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                keepalive: true,
                body: JSON.stringify({
                    session_id: SESSION_ID,
                    api_key: API_KEY
                })
            });
        });

        // Track initial page view
        trackPageView();
    })();
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>

<!-- Mirrored from livingcolors.studio/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Apr 2025 16:48:23 GMT -->
</html>
<?php /**PATH D:\PHP-8.2.4\htdocs\clipping\resources\views/layouts/front.blade.php ENDPATH**/ ?>