<div>
    <div class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>La liste de mail reçu

                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive">
                                <thead class="table bg-dark text-white">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date de reception</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $mail )
                                        <tr>
                                            <td>{{$mail->nom}}</td>
                                            <td>{{$mail->prenom}}</td>
                                            <td>{{$mail->email}}</td>
                                            <td>{{$mail->message}}</td>
                                            <td>{{$mail->created_at}}</td>
                                            <td class="text-center">
                                                <a href="" wire:click="" data-bs-toggle="modal" data-bs-target="#sendMailModal" class="btn btn-success btn-sm mr-2" title="Répondre"><i class="mdi mdi-check"></i></a></a>
                                                {{-- <a href="" class="btn btn-danger btn-sm"  title="Archiver"><i class="mdi mdi-delete"></i></a></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$messages->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Debut du modal de reponse -->
    <div wire:ignore.self class="modal fade" id="sendMailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #2874f0 ;">
                    <h5 class="modal-title" id="exampleModalLabel">Répondre l'utilisateur</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>Chargement...
                </div>

                <div wire:loading.remove>
                    <form wire:submit.prevent="">

                        <div class="modal-body">
                            
                            <div class="mb-3">
                                <label>Nom</label>
                                <input type="text" wire:model.defer="nom" value="" class="form-control">
                                @error('nom') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Prénom</label>
                                <input type="text" wire:model.defer="prenom" class="form-control">
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" wire:model.defer="email" class="form-control"/>
                                @error('email') <small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Message</label>
                                <textarea wire:model.defer="message" rows="10" class="form-control"></textarea>
                                @error('status') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin du modal de reponse -->

    @push('script')
    <script>
            window.addEventListener('close-modal', event => {
            $('#sendMailModal').modal('hide');
            });
    </script>
    @endpush
</div>
