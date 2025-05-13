@extends('layouts.front')
@section('title',$story->title)
@section('content')
    <section class="cause pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-5">
                    <div class="section__header text-center mb-60" data-aos="fade-up" data-aos-duration="1000">
                        <span>{{ $story->title }}</span>
                        <h2 class="title-animation">Success Story</h2>
                        <div class="icon-thumb justify-content-center">
                            <div class="icon-thumb-single">
                                <span></span>
                                <span></span>
                            </div>
                            <i class="icon-donation"></i>
                            <div class="icon-thumb-single">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gutter-30">
                <div class="col-12">
                    @if($story->description)
                    <p>{!! $story->description !!}</p>
                    @else
                        <p>{{ $story->short_description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
