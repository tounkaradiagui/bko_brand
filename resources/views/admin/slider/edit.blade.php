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
                    <a href="{{url('admin/sliders' )}}" class="btn btn-danger float-end btn-sm text-white">retour</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/'.$slider->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Titre</label>
                        <input type="text" class="form-control" value="{{$slider->title}}" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control"  name="description" rows="3">{{$slider->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Image</label> <br>
                        <input type="file" class="form-control" name="image"/>
                        <img src="{{asset('uploads/slider/' .$slider->image)}}" alt="slider" style="width:50px; height:50px;">
                    </div>

                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" {{$slider->status == '1' ? 'checked' : ''}} style="width:30px; height:30px;" name="status"/> checked = Hidden, Unchecked = Visible
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