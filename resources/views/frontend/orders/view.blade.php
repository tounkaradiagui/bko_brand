@extends('layouts.app')
@section('title', 'Les détails de ma commande')
@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4>
                        <i class="fa fa-shopping-cart text-dark"> Les détails de ma commande</i>
                        <a href="{{url('orders')}}">
                            <i class="fa fa-arrow-left btn btn-danger float-end"> Back</i>
                        </a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Détail de la commande</h5>
                            <hr>
                            <h6>Id de la commande : {{$orders->id}}</h6>
                            <h6>Numéro de la commande : {{$orders->tracking_no}}</h6>
                            <h6>Date de la commande : {{$orders->created_at->format('d-m-Y h:i A')}}</h6>
                            <h6>Mode de Paiement : {{$orders->payment_mode}}</h6>
                            <h6 class="border p-2 text-success">
                                Status de la commande : 
                                <span class="text-uppercase">{{$orders->status_message}}</span>
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <h5>Détail de l'utilisateur</h5>
                            <hr>
                            <h6>Nom : {{$orders->nom}}</h6>
                            <h6>Prénom : {{$orders->prenom}}</h6>
                            <h6>Email : {{$orders->email}}</h6>
                            <h6>Numéro de Téléphone : {{$orders->phone}}</h6>
                            <h6>Code Pin : {{$orders->pincode}}</h6>
                            <h6>Adresse : {{$orders->adresse}}</h6>
                        </div>
                    </div>
                    <br>
                    <h5>Article commandé</h5>
                    <hr>
                    <div clqss="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Id de l'article</th>
                                    <th>Image</th>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($orders->orderItems as $items )
                                <tr>
                                    <td width="10%">{{$items->id}}</td>
                                    <td width="10%">
                                        @if($items->product->productImages)
                                            <img src="{{asset($items->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="{{$items->product->nom}}">
                                        @else
                                            <img src="" style="width: 50px; height: 50px" alt="">
                                        @endif
                                    </td>

                                    <td>
                                        {{$items->product->nom}}
                                        @if($items->productColor)
                                            @if($items->productColor->color)
                                                <span>- Couleur: {{$items->productColor->color->nom_couleur}}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td width="10%">{{$items->product->prix_de_vente}} F CFA</td>
                                    <td width="10%">{{$items->quantity}}</td>
                                    <td class="fw-bold">{{$items->quantity * $items->product->prix_de_vente}} F CFA</td>
                                    @php
                                        $totalPrice += $items->quantity * $items->product->prix_de_vente;
                                    @endphp
                                </tr>
                                @endforeach
                                <tr class="bg-dark text-white">
                                    <td colspan="5" class="fw-bold">Montant total</td>
                                    <td colspan="1"  class="fw-bold">{{$totalPrice}} F CFA</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection