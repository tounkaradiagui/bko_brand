@extends('layouts.app')

@section('title', 'Modification de mon mot de passe')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    @include('layouts.alert')

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
                                    <input type="text" name="current_password" class="form-control @error('current_password') is-invalid @enderror" />
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Nouveau Mot de Passe</label>
                                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Confirmer le Nouveau Mot de Passe</label>
                                    <input type="text" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
