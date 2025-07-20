@extends('layouts.front')
@section('title','Home')
@section('style')
    <style>
        .full-height {
            height: calc(100vh - 50px); /* Reduced height to hint the next section */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: 1;
        }

        .container.position-relative {
            z-index: 2;
            position: relative;
        }

        .text-white {
            color: #fff;
        }

        .scroll-down-wrap-type-1 {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .next-section-hint {
            position: absolute;
            bottom: -25px; /* Make the next section visible */
            width: 100%;
            height: 50px;
            background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.3));
            z-index: 2;
        }

        /* Responsive adjustments */
        @media only screen and (max-width: 767.98px) {
            .full-height {
                height: auto;
            }

            .bg-video {
                height: auto;
            }

            .next-section-hint {
                height: 30px;
                bottom: -15px;
            }
        }

        .color-primary-1 {
            color: #3498db; /* Change as needed */
        }

        .fa-3x {
            font-size: 3rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }
    </style>

    <style>
        /*!* Handle Style *!*/
        /*.twentytwenty-handle {*/
        /*    width: 40px;*/
        /*    height: 40px;*/
        /*    margin-left: -20px;*/
        /*    border: 3px solid white;*/
        /*    background-color: transparent; !* Transparent background *!*/
        /*    border-radius: 50%;*/
        /*    cursor: ew-resize;*/
        /*    position: absolute;*/
        /*    z-index: 30;*/
        /*    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*}*/

        /*!* Remove hover effect *!*/
        /*.twentytwenty-handle:hover,*/
        /*.twentytwenty-handle:focus,*/
        /*.twentytwenty-handle:active {*/
        /*    background-color: transparent !important; !* No hover background *!*/
        /*    border-color: white !important; !* No hover border color change *!*/
        /*}*/

        /*!* Icon Style *!*/
        /*.twentytwenty-handle:before,*/
        /*.twentytwenty-handle:after {*/
        /*    content: "";*/
        /*    display: inline-block;*/
        /*    width: 12px;*/
        /*    height: 12px;*/
        /*    background-color: white;*/
        /*    border-radius: 50%;*/
        /*}*/

        /*!* Adjust the position of the icons *!*/
        /*.twentytwenty-horizontal .twentytwenty-handle:before {*/
        /*    margin-right: 4px;*/
        /*}*/

        /*.twentytwenty-horizontal .twentytwenty-handle:after {*/
        /*    margin-left: 4px;*/
        /*}*/

        /*!* Hide labels *!*/
        /*.twentytwenty-before-label,*/
        /*.twentytwenty-after-label {*/
        /*    display: none !important;*/
        /*}*/

        /*.twentytwenty-overlay:hover {*/
        /*    background: rgba(255, 255, 255, 0.15);*/
        /*}*/

        .twentytwenty-container {
            width: 100%;
            max-width: 600px; /* optional fixed width */
            margin: auto;
            position: relative;
        }

        .twentytwenty-container img {
            width: 100%;
            display: block;
        }
    </style>

@endsection
@section('content')
    <section class="full-height vertical-center position-relative overflow-hidden">
        <video autoplay muted loop playsinline class="bg-video">
            <source src="{{asset($homePageVideo?->attachments->first()?->file)}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="container position-relative">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1 class="hero-title-small mb-10 mb-sm-10 wow fadeInDown">
                        All-in-One Media: Pro Photo, Video &amp; 3D Editing | Colors
                    </h1>

                    <div class="spacer-10"></div>

                    <h2 class="hero-title mb-40 mb-sm-20 wow fadeInDown" data-wow-delay="0.2s">
                        Image that Attracts<br>
                        <span class="visually-hidden">Converts, Sells</span>
                        <span class="color-primary-1">Hooks</span> and <br class="mobile-break">
                        <span data-period="3250" data-type='[ "Converts", "Sells"]' class="typewrite color-primary-1" aria-hidden="true">
                        <span class="wrap"></span>
                    </span>
                    </h2>

                    <p class="section-descr mb-40 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.2s" data-wow-offset="0">
                        Don’t just bring traffic, bring more sales and make more revenue than ever.
                    </p>

                    <div class="spacer-20"></div>

                    <div class="local-scroll wow fadeInUp wch-unset" data-wow-delay="0.5s" data-wow-duration="1.2s">
                        <a href="{{route('home')}}" class="btn btn-mod btn-color btn-small btn-circle btn-hover-animX me-1 mb-xs-10">
                            Get Your Free Trial Now!
                        </a>
                    </div>

                    <div class="mb-sm-20"></div>
                </div>
            </div>
        </div>

        <!-- Visual Hint for Next Section -->
        <div class="next-section-hint"></div>

        <!-- Scroll Down -->
        <div class="local-scroll scroll-down-wrap-type-1 wow fadeInUp" data-wow-offset="0">
            <div class="container text-center text-lg-start">
                <a href="#service" class="scroll-down-1">
                    <div class="scroll-down-1-icon">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="scroll-down-1-text">Scroll Down</div>
                </a>
            </div>
        </div>
        <!-- End Scroll Down -->
    </section>

    <!-- start Service -->
    <section class="page-section mt-4 mb-4 bg-green position-relative" id="service">
        <div class="divider top d-none d-sm-block"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="text-center" style="background-size: cover;">
                    <h3 class="section-title mb-30 mb-xs-20 wow fadeInUp">Our <span class="color-primary-1">Service</span> You Need</h3>
                    <p class="section-descr mb-40 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.2s" data-wow-offset="0">Discover the comprehensive range of services tailored to meet your every need. From image editing to video production and 3D modeling, we offer top-notch solutions to elevate your projects to new heights. Explore our services and unlock the potential for stunning visual content.</p>
                    <div class="spacer-20" style="background-size: cover;"></div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap flex-row justify-content-start">
                        @foreach($services as $service)
                            <div class="card" style="width: 18rem;margin-right:10px; margin-bottom:10px; ">
                                <div class="">
                                    <div class="solution borderx rounded px-2 py-3">
                                        <div class="twentytwenty-container">
                                            @foreach($service->attachments->take(2) as $attachment )
                                                <img src="{{asset($attachment->file)}}" alt="jn">
                                            @endforeach
                                        </div>
                                        <h3 class="lh-base fs-16 mb-2">{{ $service->title }}</h3>
                                        <span class="service-descr service-lim">
                                            {!! $service->description !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                        @foreach($services as $service)--}}
{{--                            <div>--}}
{{--                                <div class="mt-4 pt-2">--}}
{{--                                    <a href="background-removal.html">--}}
{{--                                    <div class="solution borderx rounded position-relative px-2 py-3">--}}

{{--                                        <div class="preview_image custom_animation">--}}
{{--                                            <span class="circle_prev_one position-absolute"></span>--}}
{{--                                            <span class="circle_prev_two position-absolute"></span>--}}
{{--                                            <span class="circle_prev_three position-absolute"></span>--}}
{{--                                            <div class="container1" class='twentytwenty-container'>--}}
{{--                                                @foreach($service->attachments as $attachment )--}}
{{--                                                    <img src="{{asset($attachment->file)}}" alt="jn">--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <h3 class="lh-base fs-16 mb-2 ">{{ $service->title }}</h3>--}}
{{--                                        <span class="service-descr service-lim">--}}
{{--                                            {!! $service->description !!}--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

                        {{--                        <div>--}}
                        {{--                            <div class="mt-4 pt-2">--}}
                        {{--                                --}}{{--<a href="background-removal.html">--}}
                        {{--                                <div class="solution borderx rounded position-relative px-2 py-3">--}}

                        {{--                                    <div class="preview_image custom_animation">--}}
                        {{--                                        <span class="circle_prev_one position-absolute"></span>--}}
                        {{--                                        <span class="circle_prev_two position-absolute"></span>--}}
                        {{--                                        <span class="circle_prev_three position-absolute"></span>--}}
                        {{--                                        <div class="container1" class='twentytwenty-container'>--}}
                        {{--                                            <img src="{{asset('themes\frontend\assets\images\work\after.png')}}" alt="jn">--}}
                        {{--                                            <img src="{{asset('themes\frontend\assets\images\work\before.png')}}" alt="jn">--}}
                        {{--                                            <!-- <img src="./assets/img/preview/02.jpg"> -->--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}

                        {{--                                    <h3 class="lh-base fs-16 mb-2">Background Removal</h3>--}}
                        {{--                                    <p class="service-descr service-lim">Removing the Background is easy; replacing it with something better is tough. And that’s what our image editing company is good at. We’ll remove the background of your image and replace it with something better that blends.</p>--}}
                        {{--                                </div>--}}
                        {{--                                --}}{{--</a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div>--}}
                        {{--                            <div class="mt-4 pt-2">--}}
                        {{--                                <a href="clipping-path.html">--}}
                        {{--                                    <div class="solution borderx rounded position-relative px-2 py-3">--}}
                        {{--                                        <div class="preview_image custom_animation">--}}
                        {{--                                            <span class="circle_prev_one position-absolute"></span>--}}
                        {{--                                            <span class="circle_prev_two position-absolute"></span>--}}
                        {{--                                            <span class="circle_prev_three position-absolute"></span>--}}
                        {{--                                            <div class="container1" class='twentytwenty-container'>--}}
                        {{--                                                <img src="{{asset('themes\frontend\assets\images\work\after.png')}}" alt="jn">--}}
                        {{--                                                <img src="{{asset('themes\frontend\assets\images\work\before.png')}}" alt="jn">--}}
                        {{--                                                <!-- <img src="./assets/img/preview/02.jpg"> -->--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}

                        {{--                                        <h3 class="lh-base fs-16 mb-2">Clipping Path</h3>--}}
                        {{--                                        <p class="service-descr service-lim">With completely hand-drawn clipping paths using the Photoshop pen tool, we give extra attention to the slightest of details. We guarantee professional image editing services to give you the cleanest images that bring you more conversion.</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div>--}}
                        {{--                            <div class="mt-4 pt-2">--}}
                        {{--                                <a href="photo-retouching.html">--}}
                        {{--                                    <div class="solution borderx rounded position-relative px-2 py-3">--}}
                        {{--                                        <div class="preview_image custom_animation">--}}
                        {{--                                            <span class="circle_prev_one position-absolute"></span>--}}
                        {{--                                            <span class="circle_prev_two position-absolute"></span>--}}
                        {{--                                            <span class="circle_prev_three position-absolute"></span>--}}
                        {{--                                            <div class="container1" class='twentytwenty-container'>--}}
                        {{--                                                <img src="{{asset('themes\frontend\assets\images\work\after.png')}}" alt="jn">--}}
                        {{--                                                <img src="{{asset('themes\frontend\assets\images\work\before.png')}}" alt="jn">--}}
                        {{--                                                <!-- <img src="./assets/img/preview/02.jpg"> -->--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}

                        {{--                                        <h3 class="lh-base fs-16 mb-2">Photo Retouching</h3>--}}
                        {{--                                        <p class="service-descr service-lim">You’ve captured your image once, you don’t have to shoot it again. Send your image to us. We’ll enhance it, remove the unwanted and add the essentials. That way, even the once ‘not-so-perfect’ image you’ve captured will start to bring you sales.</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div>--}}
                        {{--                            <div class="mt-4 pt-2">--}}
                        {{--                                <a href="color-adjustment.html">--}}
                        {{--                                    <div class="solution borderx rounded position-relative px-2 py-3">--}}
                        {{--                                        <div class="preview_image custom_animation">--}}
                        {{--                                            <span class="circle_prev_one position-absolute"></span>--}}
                        {{--                                            <span class="circle_prev_two position-absolute"></span>--}}
                        {{--                                            <span class="circle_prev_three position-absolute"></span>--}}
                        {{--                                            <div class="container1" class='twentytwenty-container'>--}}
                        {{--                                                <img src="{{asset('themes\frontend\assets\images\work\after.png')}}" alt="jn">--}}
                        {{--                                                <img src="{{asset('themes\frontend\assets\images\work\before.png')}}" alt="jn">--}}
                        {{--                                                <!-- <img src="./assets/img/preview/02.jpg"> -->--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}

                        {{--                                        <h3 class="lh-base fs-16 mb-2">Color Adjustment</h3>--}}
                        {{--                                        <p class="service-descr service-lim">Stop worrying about buying the same product with different color variants for showcasing. Get the shade that you desire with the life-like color vibrancy. We’ll make different color variants for you and help you cut down on expenses.</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="divider bottom d-none d-sm-block"></div>
    </section>
    <!-- end Service -->

    <!-- Why Choose Us Section -->
    <section class="page-section bg-light-alpha-10 bg-scroll">
        <div class="container position-relative">
            <!-- Grid -->
            <div class="row mt-n30 wow fadeInUp">

                <div class="col-md-12 wow fadeInLeft text-center" data-wow-delay="0s">
                    <h3 class="section-title-service mb-30 mb-xs-20 wow fadeInUp">
                        Why <span class="color-primary-1">Choose</span> Us
                    </h3>
                    <p class="section-descr">

                    </p>
                </div>
                <div class="spacer-full"></div>
                <div class="container text-center">
                    <div class="row">
                        @foreach($wcus as $wcu)
                            <div class="col-md-4">
                                <div class="card border-0 mb-4" style="min-height: 350px;">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <!-- Icon for Faster Delivery -->
                                            <i class="fas fa-shipping-fast fa-3x mb-3 color-primary-1"></i>
                                            <h4>{{$wcu->title}}</h4>
                                            <p class="description txt-lim4">
                                                {!! $wcu->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="card border-0 mb-4" style="min-height: 350px;">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <div class="text-center">--}}
                        {{--                                        <!-- Icon for Faster Delivery -->--}}
                        {{--                                        <i class="fas fa-shipping-fast fa-3x mb-3 color-primary-1"></i>--}}
                        {{--                                        <h4>Faster Delivery</h4>--}}
                        {{--                                        <p class="description txt-lim4">--}}
                        {{--                                            Our TAT is flexible— 24 hours to 48 hours MAX for no race against time. For emergencies, WE LET YOU CHOOSE. Urgent deliveries within ASAP 1 hour, 4 hours, and 10 hours; you demand it, we do it.--}}
                        {{--                                        </p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="card border-0 mb-4" style="min-height: 350px;">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <div class="text-center">--}}
                        {{--                                        <!-- Icon for No Mediocre AI -->--}}
                        {{--                                        <i class="fas fa-robot fa-3x mb-3 color-primary-1"></i>--}}
                        {{--                                        <h4>No Mediocre AI</h4>--}}
                        {{--                                        <p class="description txt-lim4">--}}
                        {{--                                            Every project is closely carried out, monitored, and edited by HUMANS. We don’t hate AI; we simply prioritize hand-crafted works to make your images ‘picture perfect’.--}}
                        {{--                                        </p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="card border-0 mb-4" style="min-height: 350px;">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <div class="text-center">--}}
                        {{--                                        <!-- Icon for 24/7 Support -->--}}
                        {{--                                        <i class="fas fa-headset fa-3x mb-3 color-primary-1"></i>--}}
                        {{--                                        <h4>24/7 Support</h4>--}}
                        {{--                                        <p class="description txt-lim4">--}}
                        {{--                                            Rest assured, our dedicated team is always available to swiftly address your queries. Just reach out, and we'll provide immediate assistance round the clock.--}}
                        {{--                                        </p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="card border-0 mb-4" style="min-height: 350px;">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <div class="text-center">--}}
                        {{--                                        <!-- Icon for Dedicated Team -->--}}
                        {{--                                        <i class="fas fa-users fa-3x mb-3 color-primary-1"></i>--}}
                        {{--                                        <h4>Dedicated Team</h4>--}}
                        {{--                                        <p class="description txt-lim4">--}}
                        {{--                                            Picture this! A team working solely for your project. We make sure the team we assign your project to focuses on you and your project alone.--}}
                        {{--                                        </p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="card border-0 mb-4" style="min-height: 350px;">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <div class="text-center">--}}
                        {{--                                        <!-- Icon for Competitive Price -->--}}
                        {{--                                        <i class="fas fa-dollar-sign fa-3x mb-3 color-primary-1"></i>--}}
                        {{--                                        <h4>Competitive Price</h4>--}}
                        {{--                                        <p class="description txt-lim4">--}}
                        {{--                                            We’re not cheap; we EARN the price even you’ll agree we deserve. We just make sure you don’t have to break your bank to afford us.--}}
                        {{--                                        </p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="card border-0 mb-4" style="min-height: 350px;">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <div class="text-center">--}}
                        {{--                                        <!-- Icon for Secured Data -->--}}
                        {{--                                        <i class="fas fa-lock fa-3x mb-3 color-primary-1"></i>--}}
                        {{--                                        <h4>Secured Data</h4>--}}
                        {{--                                        <p class="description txt-lim4">--}}
                        {{--                                            Your images are always secured with us. We use firewalls and security that are strong enough to stop all types of unwanted breaches.--}}
                        {{--                                        </p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

            </div>
            <!-- End Grid -->

        </div>
    </section>
    <!-- End Why Choose Us Section -->

    <!-- How it Works? -->
    <section id="section-highlight">
        {{--             data-bgimage="url(https://cdn.livingcolors.studio/colors/images/background/3P.svg) top">--}}
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <div class="text-center">
                        <h3  class="section-title mb-30 mb-xs-20 wow fadeInUp">How it <span class="color-primary-1">Works</span>?</h3>
                        <p class="section-descr">Create your account, upload your images, define your image editing needs, and relax.</p>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- feature box begin -->
                <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp text-center" data-wow-delay="0s">
                    <div class="feature-box f-boxed style-3">
                        <span class="step">1</span>
                        <div id="lottie-container1" class="sw-1 mb-4 icon-xxl sol-icon"></div>
                        <h4 class="features-2-title">Create an Account</h4>
                        <div class="features-2-descr txt-lim5">
                            Kickstart your journey by registering to access our free trial. Provide instructions via the form to begin seamlessly.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="col-lg-3 col-md-6 mb-4 sq-item wow fadeInUp text-center" data-wow-delay=".25s">
                    <div class="feature-box f-boxed style-3">
                        {{--                        <i class="fa fa-tasks step-icon"></i>--}}
                        <span class="step">2</span>
                        <div id="lottie-container2" class="sw-1 mb-4 icon-xxl sol-icon"></div>
                        <h4 class="features-2-title">Choose Service</h4>
                        <div class="features-2-descr txt-lim5">
                            Opt for your desired editing options. Upon satisfaction, proceed to payment to complete the process seamlessly and efficiently.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="col-lg-3 col-md-6 mb-4 sq-item wow fadeInUp text-center" data-wow-delay=".25s">
                    <div class="feature-box f-boxed style-3">
                        {{--                        <i class="fa fa-upload step-icon"></i>--}}
                        <span class="step">3</span>
                        <div id="lottie-container3" class="sw-1 mb-4 icon-xxl sol-icon"></div>
                        <h4 class="features-2-title">Upload Images</h4>
                        <div class="features-2-descr txt-lim5">
                            Following registration, effortlessly upload your images for editing. We'll transform them according to your instructions promptly.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp text-center" data-wow-delay="0s">
                    <div class="feature-box f-boxed style-3">
                        {{--                        <i class="fa fa-coffee step-icon"></i>--}}
                        <span class="step">4</span>
                        <div id="lottie-container4" class="sw-1 mb-4 icon-xxl sol-icon"></div>
                        <h4 class="features-2-title">Relax</h4>
                        <div class="features-2-descr txt-lim5">
                            Relax while we handle the rest. Sit back as your images are expertly edited and delivered hassle-free.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->
            </div>

            <div class="spacer-40"></div>
            <div class="col-md-12 text-center">
                {{--                <a class="btn btn-mod btn-color btn-small btn-circle" href="index.html">Try For Free!</a>--}}
            </div>
        </div>
    </section>
    <!-- End How it Works? -->

    <!-- Portfolio Section -->
    {{--    <section class="page-section" id="portfolio" data-bgimage="url(https://cdn.livingcolors.studio/colors/images/background/3PRT.svg) top">--}}
    {{--        <div class="bg-line-1 z-index-1x opacity-035" data-rellax-y data-rellax-speed="-0.3" data-rellax-percentage="0.85">--}}
    {{--            <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/background/Line Art Gradient New.svg" alt="Line">--}}
    {{--        </div>--}}
    {{--        <div class="container position-relative">--}}

    {{--            <div class="row mb-xs-40">--}}
    {{--                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center">--}}
    {{--                    <h3 class="section-title mb-30 mb-xs-20 wow fadeInUp">See Our <span class="color-primary-1">Work </span> Yourself</h3>--}}
    {{--                    <p class="section-descr mb-40 mb-sm-20 wow fadeInUp" data-wow-delay="0.06s">--}}
    {{--                        We’ve tested methods that make us unique, implemented them and brought success to businesses. Even today, we have more than 80% of our clients returning to us OUT OF LOVE. See our work and you can relate.--}}
    {{--                    </p>--}}
    {{--                    <div class="local-scroll wow fadeInUp" data-wow-delay="0.12s">--}}
    {{--                        <a href="portfolio.html" class="btn btn-mod btn-circle btn-border btn-medium" data-link-animate="y">See Edited Images</a>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- Images Composition -->--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-sm-4 mb-xs-50">--}}
    {{--                    <div class="me-xl-4 pe-sm-2">--}}
    {{--                        <div class="composition-1">--}}
    {{--                            <div class="composition-1-image-1">--}}
    {{--                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\1711094783-65fd3bff26514.webp')}}" alt="Image Description" />--}}
    {{--                            </div>--}}
    {{--                            <div class="composition-1-image-2">--}}
    {{--                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\1709618533-65e6b565cce28.webp')}}" alt="Image Description" />--}}
    {{--                            </div>--}}
    {{--                            <div class="composition-1-decoration-1" data-rellax-y data-rellax-speed="-0.5" data-rellax-percentage="0.65">--}}
    {{--                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\1707924500-65ccdc1416466.webp')}}" alt="decoration" />--}}
    {{--                            </div>--}}

    {{--                            <div class="composition-1-decoration-2 sw1" data-rellax-y data-rellax-speed="0.5" data-rellax-percentage="0.2">--}}
    {{--                            <span class="circle-svg">--}}
    {{--                            <dotlottie-player class="icon-xl center-xy" autoplay loop playMode="normal"--}}
    {{--                                              src="{{asset('themes\frontend\assets\images\work\11.webp')}}">--}}
    {{--                            </dotlottie-player>--}}
    {{--                        </span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-4 mb-xs-50">--}}
    {{--                    <div class="ms-xl-5 ps-sm-2 me-xl-4 pe-sm-2 pe-xl-3">--}}
    {{--                        <div class="composition-2">--}}

    {{--                            <div class="composition-2-image-1 mt-xs-0">--}}
    {{--                                <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/work/1710908772-65fa6564026d0.webp" alt="Image" />--}}
    {{--                            </div>--}}
    {{--                            <div class="composition-2-image-2">--}}
    {{--                                <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/work/1710908786-65fa65722003b.webp" alt="Image" />--}}
    {{--                            </div>--}}
    {{--                            <div class="composition-2-decoration" data-rellax-y data-rellax-speed="0.5" data-rellax-percentage="0.2">--}}
    {{--                            <span class="circle-svg">--}}
    {{--                            <dotlottie-player class="icon-xl center-xy" autoplay loop playMode="normal"--}}
    {{--                                              src="https://cdn.livingcolors.studio/colors/images/icons/json/service/Color-Adjustment.lottie">--}}
    {{--                            </dotlottie-player>--}}
    {{--                        </span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-4">--}}
    {{--                    <div class="ms-xl-4 ps-sm-2">--}}
    {{--                        <div class="composition-3">--}}
    {{--                            <div class="composition-3-image-1">--}}
    {{--                                <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/work/clipping_before.webp" alt="Image" />--}}
    {{--                            </div>--}}
    {{--                            <div class="composition-3-image-2">--}}
    {{--                                <img loading="lazy" src="../cdn.livingcolors.studio/colors/images/work/1707924500-65ccdc1416466.html" alt="Image" />--}}
    {{--                            </div>--}}
    {{--                            <div class="composition-3-decoration-1" data-rellax-y data-rellax-speed="0.5" data-rellax-percentage="0.7">--}}
    {{--                            <span class="circle-svg">--}}
    {{--                                <dotlottie-player class="icon-lottie center-xy" autoplay loop playMode="normal"--}}
    {{--                                                  src="https://cdn.livingcolors.studio/colors/images/icons/json/service/Photo-Retouch.lottie">--}}
    {{--                                </dotlottie-player>--}}
    {{--                            </span>--}}
    {{--                            </div>--}}
    {{--                            <div class="composition-3-decoration-2" data-rellax-y data-rellax-speed="-0.5" data-rellax-percentage="0.5">--}}
    {{--                                <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/services/Background-Remove.svg" alt="Background-Remove" />--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- End Images Composition -->--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- End Portfolio Section -->
    <!-- Expart Section -->
    {{--    <section class="section-highlight bg-gray-light-1 overflow-hidden">--}}

    {{--        <!-- Decoration Circles -->--}}
    {{--        <div class="decoration-14"></div>--}}
    {{--        <div class="decoration-15"></div>--}}
    {{--        <!-- End Decoration Circles -->--}}

    {{--        <div class="container position-relative">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <div class="expand-custom">--}}
    {{--                        <div class="row align-items-center">--}}
    {{--                            <div class="col-lg-8  wow fadeInLeft" data-wow-delay="0s">--}}
    {{--                                <h3 class="offer-section">Let <span class="color-primary-1">Experts</span> Take the Headache</h3>--}}
    {{--                                <p class="section-descr">--}}
    {{--                                    This is what we are good at. Let us do the brainwork while you focus on other nooks and crannies of your business.--}}
    {{--                                </p>--}}
    {{--                                <!-- <div class="spacer-half"></div> -->--}}
    {{--                                <div class="spacer-double"></div>--}}
    {{--                                <a class="btn btn-mod btn-color btn-small btn-circle" href="contact-us.html">Contact Us Now</a>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-3 d-none d-lg-block d-xl-block text-center wow fadeInRight gallery zoom" data-wow-delay="0s">--}}
    {{--                                <img loading="lazy" class="relative img-fluid" src="https://cdn.livingcolors.studio/colors/images/icons/professional_help.webp" alt="Professional Help" />--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-1 d-none d-lg-block d-xl-block text-center wow fadeInTop" data-wow-delay="0s">--}}
    {{--                                <span class="toggle"></span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="details">--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-md-12">--}}
    {{--                                    <div class="box-custom">--}}
    {{--                                        <h2 class='offer-section-h2 mt-4'>Premier Image Editing Company for All Your Visual Needs</h2><p class='section-descr'>Achieve the pinnacle of image perfection with our top-notch image editing services. We bring out the best or your raw photos. If your images require complex modifications, our team of expert editors is here to assist. We ensure every detail is polished to your satisfaction Utilizing state-of-the-art tools and techniques. Let us transform your visuals into works of art that speak volumes.</p><h2 class='offer-section-h2 mt-4'>Professional Photo Editing Services for Ecommerce Excellence</h2><p class='section-descr'>Scale up your online store's appearance with our professional photo editing services tailored for ecommerce. Crisp, clear, and captivating images can significantly boost your product sales. Our skilled editors specialize in enhancing product photos to highlight their best features. Means you can attract more customers and show off your brand's visual appeal. Partner with us to create stunning visuals that convert visitors into buyers.</p><h2 class='offer-section-h2 mt-4'>Outsource Photo Editing for Seamless Image Enhancements</h2><p class='section-descr'>Streamline your workflow by outsourcing photo editing to our team of expert professionals. We offer a seamless integration of our services into your existing processes. So, you can ensure quick turnarounds and consistent, high-quality results. From simple touch-ups to complex image alterations, our experts handle it all with precision and care. Focus on growing your business while we perfect your images.</p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="spacer-half"></div>--}}
    {{--                                <div class="col-md-12">--}}
    {{--                                    <a class="btn btn-mod btn-color btn-small btn-circle" href="https://order.livingcolors.studio/">Order Now</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <section class="section-testimonial" id="section-testimonial">
        {{--        data-bgimage="url(https://cdn.livingcolors.studio/colors/images/background/11.svg) top">--}}
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="section-title">
                                What <span class="id-color">Customers</span> Say About Us</h3>
                            <div class="spacer-20"></div>
                        </div>
                        <div class="item-carousel owl-carousel owl-reponsive wow fadeInUp" id="testimonial-carousel">
                            @foreach($clientFeedbacks as $feedback)
                                <div class="item">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="col-3">
                                                    <!-- Circular Image -->
                                                    <img loading="lazy" src="{{asset($feedback->attachments->file )}}" class="ImageProfile" alt="Profile Image">
                                                    <span class="tick">
                                            <i class="fas fa-check-double"></i>
                                        </span>
                                                </div>

                                                <div class="col p-2" style="line-height: 1;">
                                                    <p class="card-text">{{ $feedback->client_name }}</p>
                                                    <i class="fas fa-map-marker-alt" style="color: green;"></i> {{ $feedback->location }}
                                                </div>
                                            </div>

                                            <!-- Line -->
                                            <hr class="grey-line">

                                            <!-- Start Date -->
                                            <div class="d-flex align-items-center">
                                                <div class="col-star">
                                                    <i class="icon_green_star"></i>
                                                    <i class="icon_green_star"></i>
                                                    <i class="icon_green_star"></i>
                                                    <i class="icon_green_star"></i>
                                                    <i class="icon_green_star"></i>
                                                </div>
                                                <div class="text-end customers__date d-">
                                                    <small>{{ $feedback->date->format('d M, Y') }}</small>
                                                </div>
                                            </div>

                                            <!-- Short Description -->
                                            <span class="txt-lim4">
                                <h5 class="card-text">{{ $feedback->subject }}</h5>
                                <small>{!! $feedback->feedback !!}</small></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{--                            <div class="item">--}}
                            {{--                                <div class="card">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-3">--}}
                            {{--                                                <!-- Circular Image -->--}}
                            {{--                                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\sm_thumb.png')}}" class="ImageProfile" alt="Profile Image">--}}
                            {{--                                                <span class="tick">--}}
                            {{--                                            <i class="fas fa-check-double"></i>--}}
                            {{--                                        </span>--}}
                            {{--                                            </div>--}}

                            {{--                                            <div class="col p-2" style="line-height: 1;">--}}
                            {{--                                                <p class="card-text">Dave Rogers</p>--}}
                            {{--                                                <i class="fas fa-map-marker-alt" style="color: green;"></i> US--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Line -->--}}
                            {{--                                        <hr class="grey-line">--}}

                            {{--                                        <!-- Start Date -->--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-star">--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="text-end customers__date d-">--}}
                            {{--                                                <small>Jan 2, 2024</small>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Short Description -->--}}
                            {{--                                        <span class="txt-lim4">--}}
                            {{--                                <h5 class="card-text">Very Pleased with the Result!</h5>--}}
                            {{--                                <small>LivingColors Studio exceeded my expectations! Image editing was flawless, and I&#039;m thrilled with the remarkable results.</small></span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="item">--}}
                            {{--                                <div class="card">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-3">--}}
                            {{--                                                <!-- Circular Image -->--}}
                            {{--                                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\sm_thumb.png')}}" class="ImageProfile" alt="Profile Image">--}}
                            {{--                                                <span class="tick">--}}
                            {{--                                            <i class="fas fa-check-double"></i>--}}
                            {{--                                        </span>--}}
                            {{--                                            </div>--}}

                            {{--                                            <div class="col p-2" style="line-height: 1;">--}}
                            {{--                                                <p class="card-text">Don Warshaw</p>--}}
                            {{--                                                <i class="fas fa-map-marker-alt" style="color: green;"></i> US--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Line -->--}}
                            {{--                                        <hr class="grey-line">--}}

                            {{--                                        <!-- Start Date -->--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-star">--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_grey"></i>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="text-end customers__date d-">--}}
                            {{--                                                <small>Jan 8, 2024</small>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Short Description -->--}}
                            {{--                                        <span class="txt-lim4">--}}
                            {{--                                <h5 class="card-text">Accurate and Super Fast!</h5>--}}
                            {{--                                <small>Thrilled with the speedy and precise image editing! A game-changer for my business. Highly recommend.</small></span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="item">--}}
                            {{--                                <div class="card">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-3">--}}
                            {{--                                                <!-- Circular Image -->--}}
                            {{--                                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\sm_thumb.png')}}" class="ImageProfile" alt="Profile Image">--}}
                            {{--                                                <span class="tick">--}}
                            {{--                                            <i class="fas fa-check-double"></i>--}}
                            {{--                                        </span>--}}
                            {{--                                            </div>--}}

                            {{--                                            <div class="col p-2" style="line-height: 1;">--}}
                            {{--                                                <p class="card-text">Dawn Snyder</p>--}}
                            {{--                                                <i class="fas fa-map-marker-alt" style="color: green;"></i> CA--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Line -->--}}
                            {{--                                        <hr class="grey-line">--}}

                            {{--                                        <!-- Start Date -->--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-star">--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="text-end customers__date d-">--}}
                            {{--                                                <small>Jan 23, 2024</small>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Short Description -->--}}
                            {{--                                        <span class="txt-lim4">--}}
                            {{--                                <h5 class="card-text">Background Was Nicely Removed.</h5>--}}
                            {{--                                <small>Impressed with the background removal service. Exceptional attention to detail. Highly satisfied with the result.</small></span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="item">--}}
                            {{--                                <div class="card">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-3">--}}
                            {{--                                                <!-- Circular Image -->--}}
                            {{--                                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\sm_thumb.png')}}" class="ImageProfile" alt="Profile Image">--}}
                            {{--                                                <span class="tick">--}}
                            {{--                                            <i class="fas fa-check-double"></i>--}}
                            {{--                                        </span>--}}
                            {{--                                            </div>--}}

                            {{--                                            <div class="col p-2" style="line-height: 1;">--}}
                            {{--                                                <p class="card-text">Michael Lehtonen</p>--}}
                            {{--                                                <i class="fas fa-map-marker-alt" style="color: green;"></i> AU--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Line -->--}}
                            {{--                                        <hr class="grey-line">--}}

                            {{--                                        <!-- Start Date -->--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-star">--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="text-end customers__date d-">--}}
                            {{--                                                <small>Feb 3, 2024</small>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Short Description -->--}}
                            {{--                                        <span class="txt-lim4">--}}
                            {{--                                <h5 class="card-text">Flawless Extraction Delivered</h5>--}}
                            {{--                                <small>Received flawless image extraction. Remarkable precision, ideal for business needs.</small></span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="item">--}}
                            {{--                                <div class="card">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-3">--}}
                            {{--                                                <!-- Circular Image -->--}}
                            {{--                                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\sm_thumb.png')}}" class="ImageProfile" alt="Profile Image">--}}
                            {{--                                                <span class="tick">--}}
                            {{--                                            <i class="fas fa-check-double"></i>--}}
                            {{--                                        </span>--}}
                            {{--                                            </div>--}}

                            {{--                                            <div class="col p-2" style="line-height: 1;">--}}
                            {{--                                                <p class="card-text">Stephany Perry</p>--}}
                            {{--                                                <i class="fas fa-map-marker-alt" style="color: green;"></i> US--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Line -->--}}
                            {{--                                        <hr class="grey-line">--}}

                            {{--                                        <!-- Start Date -->--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-star">--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_grey"></i>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="text-end customers__date d-">--}}
                            {{--                                                <small>Feb 9, 2024</small>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Short Description -->--}}
                            {{--                                        <span class="txt-lim4">--}}
                            {{--                                <h5 class="card-text">Photos are sharp and clean</h5>--}}
                            {{--                                <small>Photos returned sharp – impeccable work! LivingColors Studio consistently exceeds expectations.</small></span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="item">--}}
                            {{--                                <div class="card">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-3">--}}
                            {{--                                                <!-- Circular Image -->--}}
                            {{--                                                <img loading="lazy" src="{{asset('themes\frontend\assets\images\work\sm_thumb.png')}}" class="ImageProfile" alt="Profile Image">--}}
                            {{--                                                <span class="tick">--}}
                            {{--                                            <i class="fas fa-check-double"></i>--}}
                            {{--                                        </span>--}}
                            {{--                                            </div>--}}

                            {{--                                            <div class="col p-2" style="line-height: 1;">--}}
                            {{--                                                <p class="card-text">Mike Simonski</p>--}}
                            {{--                                                <i class="fas fa-map-marker-alt" style="color: green;"></i> US--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Line -->--}}
                            {{--                                        <hr class="grey-line">--}}

                            {{--                                        <!-- Start Date -->--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <div class="col-star">--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                                <i class="icon_green_star"></i>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="text-end customers__date d-">--}}
                            {{--                                                <small>Mar 1, 2024</small>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <!-- Short Description -->--}}
                            {{--                                        <span class="txt-lim4">--}}
                            {{--                                <h5 class="card-text">No Fuss Right on Time</h5>--}}
                            {{--                                <small>No fuss, right on time. LivingColors Studio delivers hassle-free image editing, meeting deadlines without compromising quality.</small></span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <script>
        $(window).on('load', function() {
            $('.twentytwenty-container').twentytwenty({
                move_slider_on_hover: true,
                default_offset_pct:0.5,
                orientation:'horizontal',
                no_overlay:true,
            });
        });
        // $(window).on('load', function() {
        //     $('.container1').twentytwenty({
        //         default_offset_pct: 0.5,  // Start at 50% (center)
        //         orientation: 'horizontal', // Horizontal slider
        //         before_label: '', // Remove before label
        //         after_label: '',  // Remove after label
        //         no_overlay: true, // Disable overlay
        //         move_with_handle_only: false, // Allow dragging anywhere
        //         click_to_move: true // Enable click-to-move
        //     });
        //
        //     // Fix for dragging not working
        //     $('.container1').on('mousedown touchstart', function(e) {
        //         e.preventDefault();
        //     });
        //
        //     // Optional: Add floating animation to circles
        //     $('.circle_prev_one, .circle_prev_two, .circle_prev_three').each(function(index) {
        //         $(this).css({
        //             'animation': `float 3s ease-in-out ${index * 0.3}s infinite alternate`
        //         });
        //     });
        // });
        //
        // // Adjust slider on window resize
        // $(window).on('resize', function() {
        //     $('#before_after').twentytwenty('redraw');
        // });
    </script>
@endsection
