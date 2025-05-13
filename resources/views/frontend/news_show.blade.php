@extends('layouts.front')
@section('title',$news->title)
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">{{ $news->title }}</h2>
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
                <div class="col-12">
                    {!! $news->description !!}
                </div>

            </div>
        </div>
    </section>
@endsection
