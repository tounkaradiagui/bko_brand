@extends('layouts.admin')

@section('title', 'Liste de couleurs')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>La liste de couleurs
                    <a href="{{url('admin/colors/create')}}" class="btn btn-primary float-end btn-sm text-white" title="Ajouter"><i class="mdi mdi-plus"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom de la couleur</th>
                            <th>Code couleur</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($couleurs as $colors)
                        <tr>
                            <td>{{$colors->nom_couleur}}</td>
                            <td>{{$colors->code_couleur}}</td>
                            <td>{{$colors->status ? 'Masquée':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/colors/'.$colors->id.'/edit')}}" class="btn btn-primary btn-sm" title="Modifier"><i class="mdi mdi-pen"></i></a>
                            </td>
                            <td>
                                <a href="{{url('admin/colors/'.$colors->id.'/delete')}}" onclick="return confirm('Voule-vous vraiment supprimé cette couleur ?')"
                                     class="btn btn-danger btn-sm" title="Supprimer"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
