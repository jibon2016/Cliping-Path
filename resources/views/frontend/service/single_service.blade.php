@extends('layouts.front')
@push('style')
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/work.css')}}">
@endpush
@section('title','Clipping Path '.config('app.name'))
@section('content')
    <!-- Service Hero Section -->
    <section class=" vertical-center">
        <div class="container">
            <div class="row pt-5">
                <!-- First Column -->
                <div class="col-lg-6">
                    <!-- Div 1: Title and Text -->
                    <div class="hero-content">
                        <h1 class="title-45 mb-40 mb-sm-20 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                            <span class="color-primary-1">{{ $service->title }}</span> Services
                        </h1>
                    </div>
                    <!-- Div 2: Button (Aligned to bottom) -->
                    <div class="">
                        <a href="{{ route('contact_us') }}" class="btn btn-mod btn-circle btn-color btn-large mb-xs-10" data-btn-animate="y"><span class="btn-animate-y"><span class="btn-animate-y-1">Free Trial</span><span class="btn-animate-y-2" aria-hidden="true">Free Trial</span></span></a>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- End Service Hero Section -->

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
                        @if($attachments = $service->serviceDetails->attachments)
                            @foreach($attachments->sortBy('sort')->chunk(2) as $chunks)
                                <div class="card" style="width: 22em; margin-right:10px;">
                                    <div class="">
                                        <div class=" borderx rounded p-2">
                                            <div class="twentytwenty-container" style="height: 100%;">
                                                @foreach($chunks as $attachment)
                                                    <img src="{{asset($attachment->file)}}" alt="jn">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="divider bottom d-none d-sm-block"></div>
    </section>
    <!-- end Service -->

    <!-- Expart Section -->
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
                            <div class="col-lg-8  wow fadeInLeft" data-wow-delay="0s">
                                <h4 class="offer-section">
                                    Try Us Out – <span class="color-primary-1"> Enjoy 3 Free </span> Edits on Us.
                                </h4>
                                <p class="section-descr">
                                    Skip the credit card – let’s just get started
                                </p>
                                <!-- <div class="spacer-half"></div> -->
                                <div class="spacer-10"></div>

                                <div>
                                    <a class="btn btn-mod btn-color btn-small btn-circle" href="{{ route('contact_us') }}">
                                        Upload Photos
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 d-none d-lg-block d-xl-block text-center wow fadeInRight gallery zoom" data-wow-delay="0s">
                                <div class="text-center">
                                    <dotlottie-player class="icon-lottie" autoplay loop playMode="normal"
                                                      src="{{ asset('/img/upload.lottie') }}">
                                    </dotlottie-player>
                                </div>
                            </div>
                            <div class="col-lg-1 d-none d-lg-block d-xl-block text-center wow fadeInTop" data-wow-delay="0s">
                                <span class="toggle"></span>
                            </div>
                        </div>
{{--                        <div class="details">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="box-custom">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-12">--}}
{{--                                    <a class="btn btn-mod btn-color btn-small btn-circle" href="#">Order Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
