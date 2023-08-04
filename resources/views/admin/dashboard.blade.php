@extends('layouts.admin')

@section('title', 'Mon Tableau de Bord')
@section('content')

<div class="row">

    <div class="col-md-12 grid-margin">

        <div class="d-flex justify-content-between flex-wrap">

            <div class="d-flex align-items-end flex-wrap">

                <div class="mr-md-3 mr-xl-5">

                    @if(session('message'))
                        <h2 class="alert alert-success">{{session('message')}}</h2>
                    @endif

                    <p class="mb-md-0">Mon tableau de bord analytique.</p>
                </div>

            </div>

            <div class="d-flex justify-content-between align-items-end flex-wrap">

                <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                    <i class="mdi mdi-download text-muted"></i>
                </button>

                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                </button>

                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted"></i>
                </button>

                {{-- <button class="btn btn-primary mt-2 mt-xl-0">Download report</button> --}}

            </div>

        </div>
        <hr>

        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Commande Total</label>
                    <h1>{{$orders}}</h1>
                    <a href="{{url('admin/orders')}}" class="text-white">Voir Plus</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Commande d'aujourd'hui</label>
                    <h1>{{$dailyOrder}}</h1>
                    <a href="{{url('admin/orders')}}" class="text-white">Voir Plus</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Commande de ce Mois</label>
                    <h1>{{$thisMonthOrder}}</h1>
                    <a href="{{url('admin/orders')}}" class="text-white">Voir Plus</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label for="">Commande de cette année</label>
                    <h1>{{$thisYearsOrder}}</h1>
                    <a href="{{url('admin/orders')}}" class="text-white">Voir Plus</a>
                </div>
            </div>

        </div>
        <hr>

        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Produits Total</label>
                    <h1>{{$products}}</h1>
                    <a href="{{url('admin/products')}}" class="text-white">Voir Plus</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Catégories Total</label>
                    <h1>{{$categories}}</h1>
                    <a href="{{url('admin/category')}}" class="text-white">Voir Plus</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Nombre de Marque</label>
                    <h1>{{$brands}}</h1>
                    <a href="{{url('admin/brands')}}" class="text-white">Voir Plus</a>
                </div>
            </div>

        </div>
        <hr>

        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Tous les utilisateurs</label>
                    <h1>{{$totalAllUsers}}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">Voir Plus</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-warning text-white mb-3">
                    <label for="">Nombre d'administrateur</label>
                    <h1>{{$totalAdmin}}</h1>
                    <a href="{{url('admin/user')}}" class="text-white">Voir Plus</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Utilisateurs normal</label>
                    <h1>{{$totalNormalUsers}}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">Voir Plus</a>
                </div>
            </div>

        </div>
        <hr>

    </div>

</div>

@endsection
