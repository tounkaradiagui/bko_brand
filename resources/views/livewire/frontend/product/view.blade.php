<div>
    <div class="py-3 py-md-5">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if($product->productImages)
                        <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                            Aucune image ajoutée
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->nom}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Accueil / {{$product->category->name}} / {{$product->nom}} 
                        </p>
                        <div>
                            <span class="selling-price">${{$product->prix_de_vente}}</span>
                            <span class="original-price">${{$product->prix_original}}</span>
                        </div>
                        <div>

                            @if($product->productColors->count() > 0)
                            
                                @if($product->productColors)
                                    @foreach($product->productColors as $colorItem)
                                        <label class="colorSelectionLabel" style="background-color:{{$colorItem->color->code_couleur}}" 
                                         wire:click="colorSelected({{$colorItem->id}})" >
                                            {{$colorItem->color->nom_couleur}}

                                        </label>
                                    @endforeach
                                @endif

                                <div>
                                
                                    @if($this->productColorSelectedQuantity == 'enRuptureDeStock')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">En rupture de  Stock</label>
                                    @elseif($this->productColorSelectedQuantity > 0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">En Stock</label>
                                    @endif
                               </div>

                            @else

                               
                                @if($product->quantite)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">En Stock</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">En rupture de  Stock</label>
                                @endif
                        

                            @endif

                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button"  class="btn btn1" wire:click="addToCart({{$product->id}})"> <i class="fa fa-shopping-cart">
                                </i> Ajouter au Panier
                            </button>

                            <button type="button" wire:click="addToWishlist({{$product->id}})"  class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist({{$product->id}})">
                                    <i class="fa fa-heart"></i> Ajouter à la liste de Souhait 
                                </span>

                                <span wire:loading wire:target="addToWishlist({{$product->id}})">
                                     En cours d'ajout...
                                </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                            {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                            {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
