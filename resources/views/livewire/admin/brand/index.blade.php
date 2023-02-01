<div>
    <div>
        @include('livewire.admin.brand.modal-form')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            La liste de marques
                            <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#ajoutModal" title="Ajouter"><i class="mdi mdi-plus"></i></a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom de la marque</th>
                                    <th>Catégorie</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($brands as $brand)
                                <tr>
                                    <td>{{$brand->nom}}</td>
                                    <td>
                                        @if($brand->category)
                                            {{$brand->category->name}}
                                        @else
                                            Aucune catégorie associée à la marque {{$brand->nom}}
                                        @endif
                                    </td>
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status =='1' ? 'masquer':'visible'}}</td>
                                    <td> <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success btn-sm" title="Modifier"><i class="mdi mdi-pen"></i> </td>
                                    <td><a href="#" wire:click="deleteBrand({{$brand->id}})" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#deleteBrandModal" title="Supprimer"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Aucune marque trouvée</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{$brands->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script>
            window.addEventListener('close-modal', event => {

            $('#ajoutModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');

            });
    </script>
    @endpush
</div>
