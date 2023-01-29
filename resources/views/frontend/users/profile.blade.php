@extends('layouts.app')

@section('title', 'Mon Profil')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

            <div class="col-md-10">
                <h4>
                    Mon Profil
                    <a href="{{url('my-password')}}" class="btn text-white btn-primary float-end">Changer votre mot de passe ?</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">
                            Détails de l'utilisateur
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{url('monProfil')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Nom</label>
                                        <input type="text" value="{{Auth::user()->nom}}" name="nom" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Prénom</label>
                                        <input type="text" value="{{Auth::user()->prenom}}" name="prenom" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Date de Naissance</label>
                                        <input type="date" value="{{Auth::user()->date_de_naissance}}" name="date_de_naissance" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Lieu de Naissance</label>
                                        <input type="lieu_de_naissance" value="{{Auth::user()->lieu_de_naissance}}" name="lieu_de_naissance" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" readonly value="{{Auth::user()->email}}" name="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Téléphone</label>
                                        <input type="text" value="{{Auth::user()->telephone}}" name="telephone" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Adresse</label>
                                        <textarea name="adresse" class="form-control" rows="3">{{Auth::user()->adresse}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Photo de Profil</label>
                                        <input type="file" name="image" class="form-control">
                                        <img src="{{asset('uploads/profile/' .Auth::user()->image)}}" class="w-45" alt="" width="100px" height="100px">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-end">Enregister</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
