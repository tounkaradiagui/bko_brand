<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if($product->productImages)
                        <div class="exzoom" id="exzoom">
                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->productImages as $itemImages )
                                    <li><img src="{{ asset($itemImages->image) }}"/></li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div>
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
                        <p class="product-path">Marque : {{$product->marque}}</p>
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

                               
                                @if($product->quantity)
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

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>
                        Produits Connexe de la marque
                        @if ($product)
                        {{$product->marque}}
                        @endif
                    </h3>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    @if ($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($category->relatedProducts as $relatedproducts) 
                                @if ($relatedproducts->marque == "$product->marque")
                                    <div class="item mb-3">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                @if($relatedproducts->productImages->count() > 0)
                                                <a href="{{url('/collections/'.$relatedproducts->category->slug.'/'.$relatedproducts->slug)}} ">
                                                    <img src="{{asset($relatedproducts->productImages[0]->image)}}" alt="{{$relatedproducts->nom}}">
                                                </a>
                                                @endif
                                            </div>
                                            <div class="product-card-body">
                                                <p class="product-brand">{{$relatedproducts->marque}}</p>
                                                <h5 class="product-name">
                                                    <a href="{{url('/collections/'.$relatedproducts->category->slug.'/'.$relatedproducts->slug)}} ">
                                                    {{$relatedproducts->nom}} 
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">${{$relatedproducts->prix_de_vente}}</span>
                                                    <span class="original-price">${{$relatedproducts->prix_original}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                    <div class="p-2">
                        <h4>
                            Pas de Produits Connexe disponible
                        </h4>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>
                        Produits Connexe de la catégorie
                        @if ($category)
                            {{$category->name}}
                        @endif
                    </h3>
                    <div class="underline"></div>
                </div>
                @forelse ($category->relatedProducts as $relatedproducts)               
                    <div class="col-md-3 mb-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if($relatedproducts->productImages->count() > 0)
                                <a href="{{url('/collections/'.$relatedproducts->category->slug.'/'.$relatedproducts->slug)}} ">
                                    <img src="{{asset($relatedproducts->productImages[0]->image)}}" alt="{{$relatedproducts->nom}}">
                                </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{$relatedproducts->marque}}</p>
                                <h5 class="product-name">
                                    <a href="{{url('/collections/'.$relatedproducts->category->slug.'/'.$relatedproducts->slug)}} ">
                                    {{$relatedproducts->nom}} 
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">${{$relatedproducts->prix_de_vente}}</span>
                                    <span class="original-price">${{$relatedproducts->prix_original}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>
                            Pas de Produits Connexe disponible
                        </h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(function(){

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000
            
            });

        });

        $('.four-carousel').owlCarousel({
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
    });
    </script>
@endpush
