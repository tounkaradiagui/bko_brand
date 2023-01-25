@extends('layouts.admin')
@section('content')
@section('title', 'Ajouter un nouvel utilisateur')

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
                <h4>La liste des utilisateurs
                    <a href="{{url('admin/users')}}" class="btn btn-primary float-end btn-sm text-white" title="Retourne à la liste"><i class="mdi mdi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">


                <form action="{{url('admin/users')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Mot de Passe</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <label>Confirmer le Mot de Passe</label>
                            <input type="password" name="password_confirm" class="form-control">
                        </div> --}}

                        <div class="col-md-6 mb-3">
                            <label>Selectionner un rôle</label>
                            <select name="role_as" class="form-select">
                                <option value="">Choisir</option>
                                <option value="0">Normal User</option>
                                <option value="1">Administrateur</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection()
