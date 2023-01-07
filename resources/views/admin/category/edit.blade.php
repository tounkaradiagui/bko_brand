@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               Modifier une catégorie
                    <a href="{{url('admin/category')}}" class="btn btn-danger float-end btn-sm text-white">Retour</a>
                
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nom</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-6 mb- 3">
                            <label for="name">Article</label>
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="name">Description</label>
                            <textarea name="description"  cols="" rows="3"  class="form-control">{{$category->description}}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset('/uploads/category/'.$category->image)}}" width="60px" height="60px" />
                            @error('image') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name">Statut</label><br>
                            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':''}}">
                        </div>

                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name">Meta Title</label>
                            <input type="text" name="meta_title" value="{{$category->meta_title}}"  class="form-control">
                            @error('meta_title') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="name">Mot clé</label>
                            <textarea name="meta_keyword"  cols="" rows="" class="form-control" >{{$category->meta_keyword}}</textarea>
                            @error('meta_keyword') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="name">Meta description</label>
                            <textarea name="meta_description"  cols="" rows="3" class="form-control">{{$category->meta_description}}</textarea>
                            @error('meta_description') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end text-white" >Validé</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection