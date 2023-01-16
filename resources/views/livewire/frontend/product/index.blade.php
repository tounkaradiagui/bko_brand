<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
            <div class="card">
                <div class="card-header"><h4>Marques</h4></div>
                <div class="card-body">
                    @foreach($category->brands as $brandItem)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->nom}}" /> {{$brandItem->nom}}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif
 
            <div class="card mt-3">
                <div class="card-header"><h4>Prix</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" /> High to Low
                    </label>

                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" /> Low to High
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">

            
            <div class="row">
                @forelse($products as $produit)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($produit->quantite > 0)
                            <label class="stock bg-success">En Stock</label>
                            @else
                            <label class="stock bg-danger">En rupture de stock</label>
                            @endif

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
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>
                            Pas de Produits disponible pour la Catégorie {{$category->name}}
                        </h4>

                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
