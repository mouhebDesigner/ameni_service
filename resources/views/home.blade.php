@extends('layouts.master')

@section('content')

    @include('includes.header')
    <div class="carousel slide" style="margin-top: 0px">
        <div class="carousel-item carousel-item-next carousel-item-left">
            <img src="{{ asset('front/img/carousel-3.jpg')}}" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">We Are Trusted</p>
                <h1 class="animated fadeInLeft">For Your Dream Home</h1>
                <a class="btn animated fadeInUp" href="https://htmlcodex.com/construction-company-website-template">Get A Quote</a>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="service" id="service">
        <div class="container">
            <div class="alert_success">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif
    @include('includes.service')
@endsection