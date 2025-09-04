@extends('layouts.front')
@section('title','Pricing '.config('app.name'))
@section('content')
    <!-- Service Hero Section -->
    <section  class=" full-height vertical-center" style="padding: 90px 0 50px !important;">
        <div class="container">
            <div class="row pt-5">
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
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Hero Section -->

    <section class="featured-services pt-0 pricing-section" style="padding: 0 !important;">
        <div class="container">
            <div class="justify-content-center text-center">
                <div class="service-hero-image-combination">
                    <div class="service-bg">
                        <dotlottie-player class="center-xy" autoplay loop playMode="normal" src="{{ asset('/img/cir_ani_purple.lottie') }}">

                        </dotlottie-player>
                    </div>
                </div>
            </div>
            <div class="row text-center fs-5 pb-5">
                <div class="col-md-12">
                    <h4 class="fw-medium">✨ Our image editing service rates are flexible and negotiable, based on:</h4>
                </div>
                <div class="row py-5 my-3">
                    <div class="col-md-3">
                        <h5 class="fs-5 ">📸 Volume of images</h5>
                        <p>- simple or high-end retouching</p>
                    </div>
                    <div class="col-md-3">
                        <h5 class="fs-5 ">📦 Image Complexity</h5>
                        <p>– bulk orders get special discounts</p>
                    </div>
                    <div class="col-md-3">
                        <h5 class="fs-5 ">⏱ Turnaround Time</h5>
                        <p>– standard or urgent delivery</p>
                    </div>
                    <div class="col-md-3">
                        <h5 class="fs-5 ">🎯 Specific Requirements</h5>
                        <p>– tailored edits to match your needs</p>
                    </div>
                </div>
                <div class="row py-3">
                    <h2 class="text-start ">💬 Let’s Talk!</h2>
                    <p class="text-start">Share your project details with us, and we’ll create a customized quote that perfectly fits your budget and expectations.</p>
                </div>
                <div class="row py-3 ">
                    <div class="col-12 text-center">
                        <h3 class="fs-1 fw-bold" style="margin-bottom: 10px !important;">Exclusive Discounts</h3>
                        <p class="fw-bold">We value long-term partnerships and bulk orders. Enjoy extra savings:</p>
                    </div>
                </div>
                <div class="row p-5">
                    <div class="col-md-4">
                        <h4 class="fw-bold">✅ 10% Off → 200+ images</h4>
                    </div>
                    <div class="col-md-4">
                        <h4 class="fw-bold">✅ 15% Off → 500+ images</h4>
                    </div>
                    <div class="col-md-4">
                        <h4 class="fw-bold">✅ 20% Off → 1000+ images</h4>
                    </div>
                    <div class="col-12 py-5">
                        <p class="fw-bold">🎁 Special Offer → Custom discount for long-term projects</p>
                    </div>
                </div>
                <div class="hero-button py-5 mt-5  ">
                    <a class="btn btn-mod btn-circle btn-color btn-large mb-xs-10" href="{{ route('contact_us') }}">
                        Free Trial
                    </a>
                </div>
            </div>
        </div>
    </section>




@endsection
