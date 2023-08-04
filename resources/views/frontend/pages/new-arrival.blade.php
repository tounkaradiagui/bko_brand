@extends('layouts.app')

@section('title', 'Nouvelles Arrivées')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Nouveaux Produits</h4>
                <div class="underline mb-4"></div>
            </div>
            @forelse ($news as $produit)               
                <div class="col-md-3">
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
            @empty
                <div class="col-md-12 p-2">
                    <h4>
                        Pas de Produits disponible
                    </h4>
                </div>
            @endforelse

            <div>
                <a href="{{url('/collections')}}" class="btn btn-primary mt-3 btn-sm px-3">Voir Plus</a>
            </div>
        </div>
    </div>
</div>

@endsection