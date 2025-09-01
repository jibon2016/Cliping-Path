@extends('layouts.front')
@section('title','Pricing '.config('app.name'))
@section('content')
    <!-- Service Hero Section -->
    <section data-bgimage="url(https://cdn.livingcolors.studio/colors/images/background/2P.svg) bottom" class="hero-section full-height vertical-center">
        <div class="container servicex">
            <div class="row">
                <!-- First Column -->
                <div class="col-lg-6 service-text">
                    <!-- Div 1: Title and Text -->
                    <div class="hero-content">
{{--                    <span class="sub-title-span mb-40 mb-sm-20 wow fadeInUp">Starting at 0.39$ Per Image</span>--}}
                        <div class="col-lg-12">
                            <h2 class="title-45 wow fadeInUp" data-wow-delay="0.15s">
                                Flexible <span class="color-primary-1">Pricing</span> for Every <span class="color-primary-1">Project</span>
                            </h2>
                            <p class="section-descr mb-50 mb-sm-40 wow fadeInUp" data-wow-delay="0.15s">
                                At "PHOTOPIXELQA" we understand that every project is different.
                            </p>
                        </div>
                    </div>
                    <!-- Div 2: Button (Aligned to bottom) -->
                    <div class="hero-button">
                        <a class="btn btn-mod btn-circle btn-color btn-large mb-xs-10" href="{{ route('contact_us') }}">
                            Free Trial
                        </a>
                    </div>
                </div>
                <!-- Second Column -->
                <div class="col-lg-6 justify-content-center text-center">
                    <!-- Div 1: Service Background -->
                    <div class="service-hero-image-combination">
                        <div class="service-bg">
                            <dotlottie-player class="center-xy" autoplay loop playMode="normal" src="{{ asset('/img/cir_ani_purple.lottie') }}"></dotlottie-player>
                        </div>
                        <!-- Div 2: Service Hero Image -->
{{--                        <div class="service-hero-img">--}}
{{--                            <img loading="lazy" src="https://livingcolors.studio/uploads/price/1715071595-6639ea6b2a54e.webp" style="z-index: 1;" class="hero--img" alt="" width="100%">--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Hero Section -->

    <section class="featured-services pt-0 pricing-section" data-bgimage="url(colors/images/background/2a.svg) top">
        <div class="container mt-4">
            <div class="row text-center nowrap">
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header " style="background: var(--color-primary-1);opacity: 0.8;">
                            <h4 style="color:#fff" class="my-0 font-weight-normal">Image Complexity</h4>
                        </div>
                        <div class="card-body ">
                            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>simple or high-end retouching</li>
                                <li>simple or high-end retouching</li>
                                <li>simple or high-end retouching</li>
                                <li>simple or high-end retouching</li>
                            </ul>

                        </div>
                        <div class="card-footer" style="background: var(--color-primary-1);opacity: 0.8;"></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header " style="background: var(--color-primary-1);opacity: 0.8;">
                            <h4 style="color:#fff" class="my-0 font-weight-normal">Volume of Images</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>bulk orders get special discounts</li>
                                <li>bulk orders get special discounts</li>
                                <li>bulk orders get special discounts</li>
                                <li>bulk orders get special discounts</li>
                            </ul>

                        </div>
                        <div class="card-footer" style="background: var(--color-primary-1);opacity: 0.8;"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header " style="background: var(--color-primary-1);opacity: 0.8;">
                            <h4 style="color:#fff" class="my-0 font-weight-normal">Turnaround Time</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>standard or urgent delivery</li>
                                <li>standard or urgent delivery</li>
                                <li>standard or urgent delivery</li>
                                <li>standard or urgent delivery</li>
                            </ul>

                        </div>
                        <div class="card-footer" style="background: var(--color-primary-1);opacity: 0.8;"></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header " style="background: var(--color-primary-1);opacity: 0.8;">
                            <h4 style="color:#fff" class="my-0 font-weight-normal">Specific Requirements</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>tailored edits to match your needs</li>
                                <li>tailored edits to match your needs</li>
                                <li>tailored edits to match your needs</li>
                                <li>tailored edits to match your needs</li>
                            </ul>

                        </div>
                        <div class="card-footer" style="background: var(--color-primary-1);opacity: 0.8;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="page-section bg-light-alpha-10 bg-scroll" style="background-image: url(colors/images/background/3x.svg)">
        <div class="container position-relative">

            <!-- Grid -->
            <div class="row mt-n30 wow fadeInUp">

                <div class="col-md-12 wow fadeInLeft text-center" data-wow-delay="0s">
                    <h3 class="section-title-service mb-30 mb-xs-20 wow fadeInUp">
                        Why <span class="color-primary-1">Hire</span> Us ?
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

    <!-- First 3 Edits Section -->
    <section class="section-highlight bg-gray-light-1 overflow-hidden">

        <!-- Decoration Circles -->
        <div class="decoration-14"></div>
        <div class="decoration-15"></div>
        <!-- End Decoration Circles -->

        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12">
                    <div class="expand-custom">
                        <div class="row align-items-center">
                            <div class="col-lg-8 offset-md-1 align-items-center wow fadeInLeft" data-wow-delay="0.5s">

                                <h2>
                                    Share your <span class="color-primary-1">Project</span> details  <span class="color-primary-1"> with us</span>
                                </h2>
                                <p class="section-descr">
                                    and we’ll create a customized quote that perfectly fits your budget and expectations.
                                </p>
                                <!-- <div class="spacer-half"></div> -->

                            </div>
                            <div class="col-lg-2 d-none d-lg-block d-xl-block text-center wow fadeInRight zoom" data-wow-delay="0s">
                                <dotlottie-player class="icon-lottie" autoplay loop playMode="normal"
                                                  src="{{ asset('/img/upload.lottie') }}">
                                </dotlottie-player>
                                <a class="btn btn-mod btn-color btn-large btn-circle" href="{{ route('contact_us') }}">
                                    Let's Talk
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </section>
@endsection
