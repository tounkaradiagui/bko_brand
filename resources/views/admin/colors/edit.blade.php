@extends('layouts.admin')

@section('title', 'Modification de couleurs')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>L'ajout de couleurs
                    <a href="{{url('admin/colors')}}" class="btn btn-danger float-end btn-sm text-white" title="Retour"><i class="mdi mdi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/colors/'.$color->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Nom de la couleur</label>
                        <input type="text" class="form-control" value="{{$color->nom_couleur}}" name="nom_couleur">
                    </div>
                    <div class="mb-3">
                        <label for="">Code de la couleur</label>
                        <input type="text" class="form-control" value="{{$color->code_couleur}}" name="code_couleur">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" {{$color->status ? 'checked':''}} name="status"/> Cocher = Masquée, Décocher = Visible
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
