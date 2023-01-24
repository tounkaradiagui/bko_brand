@extends('layouts.app')

@section('title', 'Welcome to golden market')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{$key == '0' ? 'active' : ''}}">
                    @if('uploads/slider/'.$slider->image)
                        <img src="{{url('uploads/slider/'.$slider->image)}}" class="d-block w-100" alt="...">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                <span>{!! $slider->title !!} </span>
                            </h1>
                            <p>
                                {!! $slider->description !!}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row jystify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Bienvenue sur Golden market</h4>
                </div>
                <div class="underline mx-auto"></div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius repudiandae tenetur quos voluptas quam minus
                    maiores suscipit aspernatur omnis ea reicienis aut vel cum, perferendis quasi natus at! Rerum, nam.
                </p>
            </div>
        </div>
    </div>


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Produits en Tendance</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($trendingProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trending-product">
                        @foreach($trendingProducts as $produit)
                        <div class="item">
                            <div class="product-card">
                                <div class="product-card-img">
                                    <label class="stock bg-danger">Nouveau</label>
                                    @if($produit->productImages->count() > 0)
                                    <a href="{{url('/collections/'.$produit->category->slug.'/'.$produit->slug)}} ">
                                        <img src="{{asset($produit->productImages[0]->image)}}" alt="{{$produit->nom}}">
                                    </a>
                                    {{-- <img src="{{url('uploads/products/'.$produit->productImages[0]->image)}}" alt="{{$produit->nom}}"> --}}
                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$produit->marque}}</p>
                                    <h5 class="product-name">
                                        <a href="{{url('/collections/'.$produit->category->slug.'/'.$produit->slug)}} ">
                                        {{$produit->nom}} 
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{$produit->prix_de_vente}}</span>
                                        <span class="original-price">${{$produit->prix_original}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                </div>
                 @else 
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>
                            Pas de Produits disponible
                        </h4>

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $('.trending-product').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endsection
