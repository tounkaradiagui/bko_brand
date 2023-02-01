<div>
    <div>
        <!-- Modal de suppression -->
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-color: #2874f0 ;">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression d'une catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form wire:submit.prevent="destroyCategory">

                        <div class="modal-body">
                            <h6>Voulez-vous vraiment supprimer cette catégorie ?</h6>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Catégories de produits
                            <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end" title="Ajouter"><i class="mdi mdi-plus"></i></a>
                        </h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category )
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->status == '1' ? 'Masquer':'Visible' }}</td>
                                    <td>
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-success btn-sm" title="Modifier"><i class="mdi mdi-pen"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal"
                                             data-bs-target="#deleteModal" class="btn btn-danger btn-sm " title="Supprimer"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div>
                            {{$categories->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script>
            window.addEventListener('close-modal', event => {

            $('#deleteModal').modal('hide');

            });
    </script>
    @endpush
</div>
