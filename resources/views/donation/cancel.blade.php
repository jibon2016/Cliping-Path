@extends('layouts.front')
@section('title','Payment Cancelled')
@section('style')
    <style>
        .alert{
            display: block;
        }
    </style>
@endsection
@section('content')
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Payment Cancelled</h2>
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
                    Payment Cancelled
                </li>
            </ol>
        </nav>
    </section>
    <section class="cart-list-area mt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Payment Cancelled</h4>
                        <p>{{ $message }}</p>
                        <hr>
                        <p class="mb-0">If you need further assistance, please contact our support team.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
