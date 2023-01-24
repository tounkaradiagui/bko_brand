@extends('layouts.admin')
@section('title', 'Mes commandes')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Mes commandes
                </h4>
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Filtrer par date</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>Filtrer par status</label>
                            <select name="status" class="form-select">
                                <option value="">Selectionner tout</option>
                                <option value="Commande en cours" {{Request::get('status') == 'Commande en cours' ? 'selected' : ''}}>En cours</option>
                                <option value="validee" {{Request::get('status') == 'validee' ? 'selected' : ''}}>Validée</option>
                                <option value="annuler" {{Request::get('status') == 'annuler' ? 'selected' : ''}}>Annuler</option>
                                <option value="livree" {{Request::get('status') == 'livree' ? 'selected' : ''}}>Livrée</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <button type="submit" class="btn btn-primary">Filtrer</button>
                        </div>
                    </div>
                </form>
                <hr>
                    <div clqss="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Id commande</th>
                                    <th>Numéro de commande</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Mode de Paiement</th>
                                    <th>Date de la commande</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($commandes as $items )
                                <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->tracking_no}}</td>
                                    <td>{{$items->nom}}</td>
                                    <td>{{$items->prenom}}</td>
                                    <td>{{$items->payment_mode}}</td>
                                    <td>{{$items->created_at->format('d-m-Y')}}</td>
                                    <td>{{$items->status_message}}</td>
                                    <td><a href="{{url('admin/orders/'.$items->id)}}" class="btn btn-primary btn-sm">Voir</a></td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" >Aucune commande disponible</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{$commandes->links()}}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection