@extends('layouts.front')
@section('title','Background')
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Background</h2>
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
                    Background
                </li>
            </ol>
        </nav>
    </section>
    <!-- ==== / banner section end ==== -->
    <!-- ==== about section start ==== -->
    <section class="about-area pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center gutter-40">
                <div class="col-12">
                    {!! $companyInformation->background !!}
                </div>

            </div>
        </div>
    </section>
@endsection
