@extends('layouts.admin')
@section('content')
@section('title', 'Gestion des utilisateurs')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>La liste des utilisateurs
                    <a href="{{url('admin/users/create')}}" class="btn btn-primary float-end btn-sm text-white" title="Ajouter un nouvel utilisateur"><i class="mdi mdi-plus-circle"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Role</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->nom}}</td>
                            <td>{{$user->prenom}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->telephone}}</td>
                            <td>{{$user->adresse}}</td>
                            <td>
                                @if ($user->role_as == '0')
                                    <label class="badge badge-primary">Normal User</label>
                                @elseif ($user->role_as == '1')
                                    <label class="badge badge-success">Administrateur</label>
                                @else
                                    <label class="badge badge-warning">Aucun rôle assigné</label>
                                @endif
                            </td>
                            {{-- <td>{{$user->status == '1' ? 'Masqué':'Visible'}}</td> --}}
                            <td>
                                <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary btn-sm" title="Modifier ?"><i class="mdi mdi-pen"></i></a>
                            </td>
                            <td>
                                <a href="{{url('admin/users/'.$user->id.'/delete')}}"
                                     onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"
                                class="btn btn-danger btn-sm" title="Supprimer ?"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Aucun utilisateur disponible</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
