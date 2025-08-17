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
                        <a href="{{route('contact_us')}}" class="btn btn-mod btn-color btn-small btn-circle btn-hover-animX me-1 mb-xs-10">
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
                    <h3 class="section-title mb-30 mb-xs-20 wow fadeInUp">The <span class="color-primary-1">Service</span> You Can Rely On</h3>
                    <p class="section-descr mb-40 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.2s" data-wow-offset="0">We provide exactly the service you need to elevate your business. With expertise, dedication, and proven editing, we turn your vision into global success.</p>
                    <div class="spacer-20" style="background-size: cover;"></div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap flex-row justify-content-center">
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
                        Why <span class="color-primary-1">Hire</span> Us?
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
                                            <img class="mb-3" src="{{ asset($wcu->attachments->file) }}" alt="">
                                            <h4>{{$wcu->title}}</h4>
                                            <p class="description txt-lim4">
                                                {!! $wcu->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                        <h3  class="section-title mb-30 mb-xs-20 wow fadeInUp">How we <span class="color-primary-1">Works</span>?</h3>
                        <p class="section-descr">Register, upload your files, specify your editing preferences, and leave the rest to us.</p>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- feature box begin -->
               @foreach($howItWorks as $howItWork)
                    <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp text-center" data-wow-delay="0s">
                        <div class="feature-box f-boxed style-3">
                            <img class="full-height mb-3 m-auto" src="{{ asset($howItWork->attachments->file) }}" alt="{{ $howItWork->name }}">
                            <span class="step">{{ $loop->iteration }}</span>
                            <h4 class="features-2-title">{{ $howItWork->name }}</h4>
                            <div class="features-2-descr txt-lim4">
                                {!!   $howItWork->details !!}
                            </div>
                        </div>
                    </div>
               @endforeach
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


    <div class="container">
        <div class="row">
            <p class="text-center">Welcom to our store... We are listed on B2B marketplace <a target="_blank" href="https://stafir.com/"> Stafir</a></p>
        </div>
    </div>

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
    </script>
@endsection
