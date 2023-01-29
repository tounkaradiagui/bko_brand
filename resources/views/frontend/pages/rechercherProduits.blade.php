@extends('layouts.app')

@section('title', 'Recherche de produits')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>Résultat de votre recherche</h4>
                <div class="underline mb-4"></div>
            </div>
            @forelse ($searchProducts as $produit)
            <div class="col-md-10">
                <div class="product-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-card-img">
                                <label class="stock bg-danger">Nouveau</label>
                                @if($produit->productImages->count() > 0)
                                <a href="{{url('/collections/'.$produit->category->slug.'/'.$produit->slug)}} ">
                                    <img src="{{asset($produit->productImages[0]->image)}}" alt="{{$produit->nom}}">
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-9">
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
                                <p style="height: 45px; overflow:hidden" >
                                    <b>Description : </b> {{$produit->description}}
                                </p>
                                <a href="{{url('/collections/'.$produit->category->slug.'/'.$produit->slug)}}" class="btn btn-outline-primary btn-sm">Voir Plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-md-12 p-2">
                    <h4>
                        Produit introuvable, Veuillez rechercher un autre Produit
                    </h4>
                </div>
            @endforelse
            <div class="col-md-10">
                {{$searchProducts->appends(request()->input())->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
