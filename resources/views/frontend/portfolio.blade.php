@extends('layouts.front')
@section('title','Portfolio '.config('app.name'))
@section('content')
    <section  class="hero-section full-height vertical-center" id="section400">
        <div class="container servicex">
            <div class="row">
                <!-- First Column -->
                <div class="col-lg-6 service-text">
                    <!-- Div 1: Title and Text -->
                    <h1 class="hero-title-small mb-10 mb-sm-10 wow fadeInUp">Portfolio - The Living Colors Studio</h1>
                    <div class="hero-content mb-4">
                        <h2 class="title-45 mb-4 mb-sm-20 wow fadeInUp">
                            Diverse <span class="color-primary-1">Design</span> Solutions for Every Need
                        </h2>
                        <div class="col-lg-10">
                            <p class="section-descr mb-50 mb-sm-40 wow fadeInUp" data-wow-delay="0.15s">
                                Have a glimpse of our comprehensive portfolio and see what we&#039;re all about at Living Colors Studio! You’ll find everything from sleek photo edits and detailed clipping paths to vibrant color adjustments and clever ghost mannequin setups. Don’t miss our dynamic video edits, 3D models, and stunning renders. We’ve got all your design needs covered.
                            </p>
                        </div>
                    </div>
                    <!-- Div 2: Button (Aligned to bottom) -->
                    <div class="hero-button ow fadeInUp">
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
                            <dotlottie-player class="center-xy" autoplay loop playMode="normal" src="{{ asset('img/bg-stars.lottie') }}"></dotlottie-player>
                        </div>
                        <!-- Div 2: Service Hero Image -->
                        <div class="service-hero-img">
                            <img loading="lazy" src="" style="z-index: 1;" class="hero--img" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Hero Section -->
    <section class="featured-services pt-4">
        <div class="container">
            <div class="works-filter text-center mb-60 mb-sm-40 z-index-1">
                <a href="#" class="filter active" role="button" aria-pressed="true" data-filter="*">All</a>
                <a href="#3" class="filter" role="button" aria-pressed="false" data-filter=".3">Clipping Path</a>
                @foreach($services as $service)
                    <a href="#{{ $service->id }}" class="filter" role="button" aria-pressed="false" data-filter=".{{ $service->id }}">{{ $service->title }}</a>
                @endforeach
            </div>
            <ul class="works-grid work-grid-3 work-grid-gut clearfix hide-titles hover-green" id="work-grid">
                <li class="work-item mix 3">
                    <a href="https://cdn.livingcolors.studio/uploads/service-portfolio/1709534075-65e56b7bdf75e.webp" class="work-lightbox-link mfp-image">
                        <div class="work-img">
                            <div class="work-img-bg wow-p scalexIn"></div>
                            <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/service-portfolio/1709534075-65e56b7bdf75e.webp" alt="Clipping Path" class="wow-p fadeIn" data-wow-delay="1s" />
                        </div>
                        <div class="work-intro">
                            <h3 class="work-title">Clipping Path</h3>
                            <div class="work-descr">
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- End How it Works Section -->


    <!-- End Our Service You Need Section -->
    <section id="hero-animated" class="hero-animated d-flex align-items-center pb-0 background">
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate" data-aos="zoom-out">
        </div>
    </section>
@endsection
