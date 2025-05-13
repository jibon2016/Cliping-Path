@extends('layouts.front')
@section('title','Image gallery')
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Image Gallery</h2>
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
                    Image Gallery
                </li>
            </ol>
        </nav>
    </section>

    <section class="testimonial-area pt-120 pb-120">
        <div class="container">
            <div class="row gallery gutter-30">
                @foreach($galleries as $gallery)
                    <div class="col-md-3 col-sm-3">
                        <div class="gallery-item">
                            <a href="{{ asset($gallery->file) }}" class="popup-link">
                                <img  src="{{ asset($gallery->file) }}" class="img-fluid" alt="Gallery Image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="mt-60 text-center">
                        {!! $galleries->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
