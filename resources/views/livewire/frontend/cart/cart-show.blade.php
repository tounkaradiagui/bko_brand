<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <h4>Mon Panier</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Produits</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Prix</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantités</h4>
                                </div>
                                 <div class="col-md-2">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Supprimer</h4>
                                </div>
                            </div>
                        </div>
                        @forelse($cart as $cartItem)
                            @if($cartItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <a href="{{url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                                                <label class="product-name">
                                                    @if($cartItem->product->productImages)
                                                        <img src="{{asset($cartItem->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="{{$cartItem->product->nom}}">
                                                    @else
                                                        <img src="" style="width: 50px; height: 50px" alt="">
                                                    @endif
                                                    {{$cartItem->product->nom}}
                                                    @if($cartItem->productColor)
                                                        @if($cartItem->productColor->color)
                                                            <span>- Couleur: {{$cartItem->productColor->color->nom_couleur}}</span>
                                                        @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">{{$cartItem->product->prix_de_vente}} F CFA</label>
                                        </div>

                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{$cartItem->quantity}}" class="input-quantity"/>
                                                    <button type="button" wire:loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">{{$cartItem->product->prix_de_vente * $cartItem->quantity}} F CFA </label>
                                             @php
                                                $totalprice += $cartItem->product->prix_de_vente * $cartItem->quantity
                                            @endphp
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{$cartItem->id}})" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removeCartItem({{$cartItem->id}})">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                    </span>

                                                    <span wire:loading wire:target="removeCartItem({{$cartItem->id}})">
                                                        <i class="fa fa-trash"></i>
                                                        En cours de suppression...
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div>Aucun produit disponible</div>
                        @endforelse

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8 my-md-auto mt-3">
                    <h4>
                        Obtenez les meilleures offres et réductions <a href="{{url('/collections')}}">Acheter maintenant</a>
                    </h4>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h5>Total :
                            <span class="float-end">{{$totalprice}} F CFA</span>
                        </h5>
                        <hr>
                        <a href="{{url('/checkout')}}" class="btn btn-warning w-100" >Commander</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
