<!-- Debut du modal d'ajout -->

<div livewire:ignore.self class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouté une marque</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="enregistMarque">

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nom de la marque</label>
                        <input type="text" wire:model.defer="nom" class="form-control">
                        @error('nom') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description de la marque</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" wire:model.defer="status"/> Checked=Hidden, Un-checked= Visible 
                        @error('status') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouté</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fin du modal d'ajout -->







<!-- Debut du modal de modification -->
<div livewire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifié la marque</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Chargement...
            </div>

            <div wire:loading.remove>
                <form wire:submit.prevent="updateBrand">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nom de la marque</label>
                            <input type="text" wire:model.defer="nom" class="form-control">
                            @error('nom') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Description de la marque</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" wire:model.defer="status"/> Checked=Hidden, Un-checked= Visible 
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Validé</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<!-- Fin du modal de modification -->







<!-- Debut du modal de suppression -->
    <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression d'une marque</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
 
                <form wire:submit.prevent="destroyBrand">

                    <div class="modal-body">
                        <h6>Voulez-vous vraiment supprimer cette marque ?</h6>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Confirmé</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
<!-- Fin du modal de suppression -->