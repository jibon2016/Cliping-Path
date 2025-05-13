@extends('layouts.front')
@section('title','News & Events')
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">News & Events</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    News & Events
                </li>
            </ol>
        </nav>
    </section>
    <!-- ==== / banner section end ==== -->
    <!-- ==== about section start ==== -->
    <section class="blog-main blog cm-details pt-80 pb-80">
        <div class="container">
            <div class="row gutter-60">
                @foreach($news as $newsItem)
                    <div class="col-12 col-lg-4">
                        <div class="blog__single-wrapper" data-aos="fade-up" data-aos-duration="1000">
                            <div class="blog__single van-tilt">
                                <div class="blog__single-thumb">
                                    <a href="{{ route('news-and-events.show',['slug'=>$newsItem->slug]) }}">
                                        <img src="{{ asset($newsItem->attachments->first()->file ?? '') }}" alt="Image">
                                    </a>
                                    <div class="tag">
                                        <a href="{{ route('news-and-events.show',['slug'=>$newsItem->slug]) }}"><i class="fa-solid fa-tags"></i>News</a>
                                    </div>
                                </div>
                                <div class="blog__single-inner">
                                    <div class="blog__single-content">
                                        <h5><a href="{{ route('news-and-events.show',['slug'=>$newsItem->slug]) }}">
                                            {{ $newsItem->title }}</a>
                                        </h5>
                                    </div>
                                    <div class="blog__single-cta">
                                        <a href="{{ route('news-and-events.show',['slug'=>$newsItem->slug]) }}" aria-label="blog details"
                                           title="blog details">Read More<i
                                                class="fa-solid fa-circle-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 mt-4">
                    {!! $news->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
