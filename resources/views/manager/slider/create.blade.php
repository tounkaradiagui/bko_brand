@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>L'ajout de sliders
                    <a href="{{url('admin/sliders')}}" class="btn btn-danger float-end btn-sm text-white" title="Retour"><i class="mdi mdi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Titre</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Image</label> <br>
                        <input type="file" class="form-control" name="image"/>
                    </div>

                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" name="status"/> Cocher = Masqué, Decocher = Visible
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
