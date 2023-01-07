<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        La liste de marques
                        <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#ajoutModal">Ajouté une marque</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->nom}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->status =='1' ? 'hidden':'visible'}}</td>
                                <td> <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success btn-sm ">Modifié</a> </td>
                                <td><a href="#" wire:click="deleteBrand({{$brand->id}})" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</a></td>
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