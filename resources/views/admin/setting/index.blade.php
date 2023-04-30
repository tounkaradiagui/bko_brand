@extends('layouts.admin')
@section('content')
@section('title', 'Configuration du site')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{session('message')}}</div>
            @endif
            <form action="" method="post">
                @csrf

                <div class="card-md-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Site Web</h3>
                    </div>
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nom du Site Web</label>
                                <input type="text" name="website_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>URL du Site Web</label>
                                <input type="text" name="website_url" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Titre de la Page</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keyword</label>
                                <input type="text" name="meta_keyword" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-md-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Informations -- Site Web</h3>
                    </div>
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Adresse</label>
                                <textarea name="adresse" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Numéro de Téléphone 1 *</label>
                                <input type="text" name="phone1" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Téléphone Mobile</label>
                                <input type="text" name="phone2" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Professionnel</label>
                                <input type="text" name="email1" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Secondaire</label>
                                <input type="text" name="email2" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-md-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Média Sociaux -- Site Web</h3>
                    </div>
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook</label>
                                <input type="text" name="facebook" placeholder="Facultatif" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram</label>
                                <input type="text" name="instagram" placeholder="Facultatif" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter</label>
                                <input type="text" name="twitter" placeholder="Facultatif" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Youtube</label>
                                <input type="text" name="youtube" placeholder="Facultatif" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary text-white">Valider</button>
                </div>

            </form>
        </div>
    </div>
@endsection
