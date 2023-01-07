@extends('layouts.app')

@section('title', 'Welcome to golden market')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    @foreach($Carousliders as $key => $slider)
    <div class="carousel-inner">
        <div class="carousel-item {{$key == '0' ? 'active' : ''}} ">
            @if('uploads/slider/'.$slider->image)
            <img src="{{asset('uploads/slider/'.$slider->image)}}" class="d-block w-100" alt="...">
            @endif
            <div class="carousel-caption d-none d-md-block">
                <h5>{!! $slider->title !!}</h5>
                <p>{!! $slider->description !!}</p>
            </div>
        </div>
    </div>
    @endforeach
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


@endsection