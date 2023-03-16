<div>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{asset('admin/images/logogolden.png')}}" alt="logo">
                            </div>

                            <h4>Bienvenue sur Golden market !</h4>
                            <h6 class="font-weight-light">Rejoignez-nous aujourd'hui! Cela ne prend que quelques secondes !!</h6>

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
                                    <label for="exampleInputEmail">Numéro de Téléphone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror form-control-lg border-left-0" id="exampleInputtelephone" wire:model="telephone" placeholder="Numéro de Téléphone">
                                    </div>
                                    @error('telephone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Adresse email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg border-left-0" id="exampleInputEmail" wire:model="email" placeholder="Email">
                                    </div>
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Mot de Passe</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror form-control-lg border-left-0" id="exampleInputPassword" placeholder="Mot de Passe">
                                    </div>
                                    @error('password') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Confirmer le Mot de Passe</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" wire:model="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror form-control-lg border-left-0" id="exampleInputPassword" placeholder="Confirmer le Mot de Passe">
                                    </div>
                                    @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="my-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Continuer</button>
                                </div>

                                <div class="mb-2 d-flex">
                                    <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                                        <i class="mdi mdi-facebook mr-2"></i>Facebook
                                    </button>
                                    <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                                        <i class="mdi mdi-google mr-2"></i>Google
                                    </button>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-primary">Connectez-vous ici !</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2023  All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
