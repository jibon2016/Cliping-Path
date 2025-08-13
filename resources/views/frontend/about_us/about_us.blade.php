@extends('layouts.front')
@section('title','About '.config('app.name'))
@section('content')
    {!! $companyInformation->about_us !!}
@endsection
