<div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12">
                <h4>
                    Nous Contacter
                </h4>
                <div class="underline mb-4"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        Veuillez renseigner ce formulaire !
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="saveData">
                            @csrf
                            <div class="form-group">
                                <label>Nom</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                    </div>
                                    <input type="text" wire:model="nom" class="form-control @error('nom') is-invalid @enderror form-control-lg border-left-0" placeholder="Nom">
                                </div>
                                @error('nom') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Prénom</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                    </div>
                                    <input type="text" wire:model="prenom" class="form-control @error('prenom') is-invalid @enderror form-control-lg border-left-0" placeholder="Prénom">
                                </div>
                                @error('prenom') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail">Adresse email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-email-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg border-left-0" id="exampleInputEmail" wire:model="email" placeholder="Email">
                                </div>
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSujet">Sujet</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-email-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control @error('sujet') is-invalid @enderror form-control-lg border-left-0" id="exampleInputSujet" wire:model="sujet" placeholder="Motif de votre message">
                                </div>
                                @error('sujet') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputMessage">Votre Message</label>
                                <div class="input-group">
                                    <textarea wire:model="message" cols="30" rows="15" @error('message') is-invalid @enderror class="form-control" placeholder="Ecrivez votre message ici !"></textarea>
                                </div>
                                @error('message') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="my-2">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
