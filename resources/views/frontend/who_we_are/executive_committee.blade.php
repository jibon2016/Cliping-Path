@extends('layouts.front')
@section('title','Executive Committees')
@section('style')
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Executive Committees</h2>
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
                    Executive Committees
                </li>
            </ol>
        </nav>
    </section>
    <!-- ==== / banner section end ==== -->
    <!-- ==== about section start ==== -->
    <section class="about-area pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center gutter-40">
                @foreach($executiveCommittees as $executiveCommittee)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Set a fixed size for the image (e.g., 150x150 pixels) -->
                            <img src="{{ asset($executiveCommittee->attachments->first()->file) }}" class="card-img-top rounded-circle mx-auto d-block" alt="Executive Committee" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $executiveCommittee->name }}</h5>
                                <p class="card-text"><strong>Designation:</strong> {{ $executiveCommittee->designation }}</p>
                                <p class="card-text"><strong>Education:</strong> {{ $executiveCommittee->education }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
