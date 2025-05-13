@extends('layouts.front')
@section('title','Success Story')
@section('content')
    <section class="cause pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-5">
                    <div class="section__header text-center mb-60" data-aos="fade-up" data-aos-duration="1000">
                        <span>Turning Challenges into Triumphs</span>
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
                @foreach($stories as $story)
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="cause__slider-inner" data-aos="fade-up" data-aos-duration="1000">
                            <div class="cause__slider-single van-tilt">
                                <div class="thumb">
                                    <a href="{{ route('success-stories.show',['slug'=>$story->slug]) }}">
                                        <img src="{{ asset($story->attachments->first()->file ?? 'img/blank.jpg') }}" alt="Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6><a href="{{ route('success-stories.show',['slug'=>$story->slug]) }}">{{ $story->title }}</a></h6>
                                    <p>{{ $story->short_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="mt-60 text-center">
                        {!! $stories->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="spade">
            <img src="{{ asset('themes/frontend/assets/images/help/spade.png') }}" alt="Image">
        </div>
    </section>
@endsection
