@extends('layouts.app')

@section('title', 'Modification de mon mot de passe')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    @if (session('message'))
                        <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                    @endif

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">
                                Modification de Mot de Passe
                            </h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ url('my-password') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Mot de Passe actuel</label>
                                    <input type="text" name="current_password" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Nouveau Mot de Passe</label>
                                    <input type="text" name="password" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Confirmer le Nouveau Mot de Passe</label>
                                    <input type="text" name="password_confirmation" class="form-control" />
                                </div>
                                <div class="mb-3 ">
                                    <a href="{{url('monProfil')}}" class="btn text-white btn-danger">Retour</a>
                                    <button type="submit" class="float-end btn btn-primary">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
