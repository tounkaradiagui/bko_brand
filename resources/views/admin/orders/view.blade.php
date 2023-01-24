@extends('layouts.admin')
@section('title', 'Les détails de ma commande')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Mes commandes
                </h4>
            </div>
            <div class="card-body">

                <h3 class="pb-3">
                    <i class="fa fa-shopping-cart text-dark"> Les détails de ma commande</i>
                    <a href="{{url('admin/orders')}}">
                        <i class="fa fa-arrow-left btn btn-danger float-end ml-2 btn-sm"> Back</i>
                    </a>
                    <a href="{{url('admin/invoice/'.$orders->id.'/generate')}}">
                        <i class="fa fa-arrow-left btn btn-success btn-sm float-end ml-2"> Télécharger la facture</i>
                    </a>
                    <a href="{{url('admin/invoice/'.$orders->id)}}" target="_blank">
                        <i class="fa fa-arrow-left btn btn-primary float-end ml-2 btn-sm" > Voir la facture</i>
                    </a>
                </h3>
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
                            @foreach ($orders->orderItems as $Orderitem )
                            <tr>
                                <td width="10%">{{$Orderitem->id}}</td>
                                <td width="10%">
                                    @if($Orderitem->product->productImages)
                                        <img src="{{asset($Orderitem->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="{{$Orderitem->product->nom}}">
                                    @else
                                        <img src="" style="width: 50px; height: 50px" alt="">
                                    @endif
                                </td>

                                <td>
                                    {{$Orderitem->product->nom}}
                                    @if($Orderitem->productColor)
                                        @if($Orderitem->productColor->color)
                                            <span>- Couleur: {{$Orderitem->productColor->color->nom_couleur}}</span>
                                        @endif
                                    @endif
                                </td>
                                <td width="10%">{{$Orderitem->product->prix_de_vente}} F CFA</td>
                                <td width="10%">{{$Orderitem->quantity}}</td>
                                <td class="fw-bold">{{$Orderitem->quantity * $Orderitem->product->prix_de_vente}} F CFA</td>
                                @php
                                    $totalPrice += $Orderitem->quantity * $Orderitem->product->prix_de_vente;
                                @endphp
                            </tr>
                            @endforeach
                            <tr >
                                <td colspan="5" class="fw-bold bg-dark text-white">Montant total</td>
                                <td colspan="1"  class="fw-bold bg-dark text-white">{{$totalPrice}} F CFA</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="card border mt-3">
            <div class="card-body">
                <h4>Processus de commande</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$orders->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <label>Modifier le status de la commande</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">Selectionner un status</option>
                                    <option value="Commande en cours" {{Request::get('status') == 'Commande en cours' ? 'selected' : ''}}>En cours</option>
                                    <option value="validee" {{Request::get('status') == 'validee' ? 'selected' : ''}}>Validée</option>
                                    <option value="annuler" {{Request::get('status') == 'annuler' ? 'selected' : ''}}>Annuler</option>
                                    <option value="livree" {{Request::get('status') == 'livree' ? 'selected' : ''}}>Livrée</option>
                                </select>
                                <button type="submit" class="btn btn-primary text-white">Validée</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <br/>
                        <h4 class="mt-3">Status actuel de la commande : <span class="text-uppercase">{{$orders->status_message}}</span> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection