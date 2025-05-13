@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <a href="{{ route('slider.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-fuchsia elevation-1"><i class="fas fa-image"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sliders</span>
                    <span class="info-box-number">{{ number_format($sliders) }}</span>
                </div>
            </div>
        </a>
        <a href="{{ route('activity-category.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Activity Categories</span>
                    <span class="info-box-number">{{ number_format($activityCategories) }}</span>
                </div>
            </div>
        </a>
        <a href="{{ route('activity.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Activity</span>
                    <span class="info-box-number">{{ number_format($activityCategories) }}</span>
                </div>
            </div>
        </a>
        <a href="{{ route('story.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Success Story</span>
                    <span class="info-box-number">{{ number_format($activityCategories) }}</span>
                </div>
            </div>
        </a>
        <a href="{{ route('gallery.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Gallery</span>
                    <span class="info-box-number">{{ number_format($activityCategories) }}</span>
                </div>
            </div>
        </a>
        <a href="{{ route('customer.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Partners</span>
                    <span class="info-box-number">{{ number_format($activityCategories) }}</span>
                </div>
            </div>
        </a>
        <a href="{{ route('news.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-info elevation-1 text-white"><i class="fas fa-list-ul"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text ">News</span>
                    <span class="info-box-number">{{ number_format($news) }}</span>
                </div>
            </div>
        </a>
        <a href="{{ route('customer.index') }}" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-cyan elevation-1 text-white"><i class="fas fa-list-ul"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text ">Partners</span>
                    <span class="info-box-number">{{ number_format($customers) }}</span>
                </div>
            </div>
        </a>
    </div>
@endsection
