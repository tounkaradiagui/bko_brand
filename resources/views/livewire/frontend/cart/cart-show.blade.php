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
                                <div class="col-md-6">
                                    <h4>Produits</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Prix</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantités</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Supprimer</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartItem )
                            @if ($cartItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
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
                                            <label class="price">${{$cartItem->product->prix_de_vente}} </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                                    <input type="text" value="{{$cartItem->quantity}}" class="input-quantity" readonly/>
                                                    <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Remove
                                                </a>
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

        </div>
    </div>
</div>
