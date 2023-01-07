@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>La liste de couleurs
                    <a href="{{url('admin/colors/create')}}" class="btn btn-primary float-end btn-sm text-white">Ajouter</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom de la couleur</th>
                            <th>Code couleur</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($couleurs as $colors)
                        <tr>
                            <td>{{$colors->id}}</td>
                            <td>{{$colors->nom_couleur}}</td>
                            <td>{{$colors->code_couleur}}</td>
                            <td>{{$colors->status ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/colors/'.$colors->id.'/edit')}}" class="btn btn-primary btn-sm" >edit</a>
                            </td>
                            <td>
                                <a href="{{url('admin/colors/'.$colors->id.'/delete')}}" onclick="return confirm('Voule-vous vraiment supprimé cette couleur ?')" class="btn btn-danger btn-sm" >delete</a>
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