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
                    <a href="{{url('admin/sliders/create')}}" class="btn btn-primary float-end btn-sm text-white" title="Ajouter"><i class="mdi mdi-plus"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->description}}</td>
                            <td>
                                <img src="{{url('uploads/slider/'.$slider->image)}}" style='width:70px; height:70px;' alt="Slider">

                            </td>
                            <td>{{$slider->status ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-primary btn-sm" title="Modifier ?"><i class="mdi mdi-pen"></i></a>
                            </td>
                            <td>
                                <a href="{{url('admin/sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Voule-vous vraiment supprimé ce slider ?')" class="btn btn-danger btn-sm" title="Supprimer ?"><i class="mdi mdi-delete"></i></a>
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
