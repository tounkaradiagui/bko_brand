@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>L'ajout de couleurs
                    <a href="{{url('admin/colors')}}" class="btn btn-danger float-end btn-sm text-white">retour</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/colors/create')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Nom de la couleur</label>
                        <input type="text" class="form-control" name="nom_couleur">
                    </div>
                    <div class="mb-3">
                        <label for="">Code de la couleur</label>
                        <input type="text" class="form-control" name="code_couleur">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" name="status"/> checked = Hidden, Unchecked = Visible
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection