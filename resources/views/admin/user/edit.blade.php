@extends('layouts.admin')
@section('content')
@section('title', 'Modifier un nouvel utilisateur')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <div class="card shadow">
            <div class="card-header">
                <h4>Mise à jour des utilisateurs
                    <a href="{{url('admin/users')}}" class="btn btn-primary float-end btn-sm text-white" title="Retourne à la liste"><i class="mdi mdi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">


                <form action="{{url('admin/users/'.$getUser->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nom</label>
                            <input type="text" value="{{$getUser->nom}}" name="nom" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Prénom</label>
                            <input type="text" value="{{$getUser->prenom}}" name="prenom" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" value="{{$getUser->email}}" name="email" readonly class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Mot de Passe</label>
                            <input type="text" value="" name="password" class="form-control">
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <label>Confirmer le Mot de Passe</label>
                            <input type="password" name="password_confirm" class="form-control">
                        </div> --}}

                        <div class="col-md-6 mb-3">
                            <label>Selectionner un rôle</label>
                            <select name="role_as" class="form-select">
                                <option value="">Choisir</option>
                                <option value="0" {{$getUser->role_as == '0' ? 'selected' : ''}}>Normal User</option>
                                <option value="1"{{$getUser->role_as == '1' ? 'selected' : ''}}>Administrateur</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection()
