@extends('layouts.app')
@section('title', 'Connectez-vous')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{ asset('admin/images/logogolden.png') }}" alt="logo">
                            </div>
                            <h4>Bienvenue | Aw Bissimilah !</h4>
                            <h6 class="font-weight-light">Content de vous revoir !!</h6>

                            @include('layouts.alert')
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Adresse email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror form-control-lg border-left-0"
                                            id="exampleInputEmail" name="email" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Mot de Passe</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span
                                                class="input-group-text bg-transparent border-right-0 @error('password') is-invalid @enderror">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password"
                                            class="form-control form-control-lg border-left-0" id="exampleInputPassword"
                                            placeholder="Mot de Passe">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            Se souvenir de moi
                                        </label>
                                    </div>
                                    <a href="{{route('password.request')}}" class="auth-link text-link" style="color: red">Mot de Passe oublié ?</a>
                                </div>

                                <div class="my-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">S'identifier</button>
                                </div>

                                <div class="mb-2 d-flex">
                                    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                                        <i class="mdi mdi-facebook mr-2"></i>Facebook
                                    </a>
                                    <a href="{{ url('/auth/google') }}" type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                                        <i class="mdi mdi-google mr-2"></i>Google
                                    </a>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="text-primary">Créer
                                        un compte ici !</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2023
                            All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
