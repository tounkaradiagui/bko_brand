@extends('layouts.admin')

@section('title', 'Enregistremment de Produits')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>L'ajout de produits
                    <a href="{{url('admin/products')}}" class="btn btn-danger float-end btn-sm text-white" title="Retour"><i class="mdi mdi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data">
                @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Accueil

                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                Tag de référencement (SEO)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Détails
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Images du produit
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                Couleur du produit
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Catégorie</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Nom du produit</label>
                                <input type="text" name="nom" class="form-control">
                            </div>


                            <div class="mb-2">Slug du produit</label>
                                <input type="text" name="slug" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Choisir la marque</label>
                                <select name="marque" class="form-control">
                                    @foreach($brands as $marque)
                                    <option value="{{$marque->nom}}">{{$marque->nom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Courte description (200 mots max)</label>
                                <textarea name="small_description" id="" cols="33" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Titre du SEO</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Mots clés</label>
                                <textarea name="meta_keyword" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Le prix réel</label>
                                        <input type="text" name="prix_original" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Le prix de ventes</label>
                                        <input type="text" name="prix_de_vente" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Quantité</label>
                                        <input type="number" name="quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Tendance (mode)</label>
                                        <input type="checkbox" name="tendance" style="width: 50px; height: 50;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Populaire</label>
                                        <input type="checkbox" name="featured" style="width: 50px; height: 50;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" style="width: 50px; height: 50;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Choisir l'image du produit</label>
                                <input type="file" name="image[]" multiple  class="form-control"/>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Choisir une couleur</label>
                                <hr/>
                                <div class="row">
                                    @forelse($colors as $coloritem)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Couleur : <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}"/>
                                            {{$coloritem->nom_couleur}}
                                            </br>
                                            Quantité : <input type="number" name="colorquantity[{{$coloritem->id}}]" style=" width: 70; border: 1px solid"/>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h1>Aucune couleur trouvée</h1>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
