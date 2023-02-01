@extends('layouts.app')

@section('title', "Merci d'avoir acheté nos produits !")
@section('content')

    <div class="py-3 pyt-md-4">

        <div class="container">

            <div class="row">

                <div class="col-md-12 text-center">
                    @if(session('message'))
                        <h5 class="alert alert-success">{{session('message')}}</h5>
                    @endif
                    <div class="p-4 shadow bg-white">
                        <h2>
                            <img src="{{asset('admin/images/logogolden.png')}}" title="Golden Market"  alt="Golden Market" width="500px" height="400px">
                        </h2>
                        <h4>Merci pour vos achats avec golden market</h4>
                        <a href="{{url('/collections')}}" class="btn btn-primary">Acheter d'autres produits</a>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
