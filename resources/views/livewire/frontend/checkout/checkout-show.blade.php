<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            @if($this->totalProductAmont != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Montant total de l'article :
                            <span class="float-end">{{$totalProductAmont}} F cFA</span>
                        </h4>
                        <hr>
                        <small>* Les articles seront livrés en 3 jours.</small>
                        <br/>
                        <small>* Des charges seront incluses si vous n'êtes pas à Bamako !</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Informations de base
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label>Nom</label>
                                <input type="text" id="nom" wire:model.defer="nom" class="form-control" placeholder="Saisir le nom" />
                                @error('nom') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Prénom</label>
                                <input type="text" id="prenom" wire:model.defer="prenom" class="form-control" placeholder="Saisir le prénom"/>
                                @error('prenom') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Numéro de téléphone</label>
                                <input type="text" id="telephone" wire:model.defer="telephone" class="form-control" placeholder="Votre numéro de téléphone joignable"/>
                                @error('telephone') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Adresse email</label>
                                <input type="email" id="email" wire:model.defer="email" class="form-control" placeholder="Votre adresse email"/>
                                @error('email') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Code Postal (Zip-code)</label>
                                <input type="text" id="pincode" wire:model.defer="pincode" class="form-control" placeholder="Veuillez saisir votre code Postal" />
                                @error('pincode') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Adresse complet</label>
                                <textarea id="adresse" wire:model.defer="adresse" class="form-control" placeholder="Précisez votre adresse. Ville, Quartier, Rue... " rows="2"></textarea>
                                @error('adresse') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3"  wire:ignore>
                                <label>Selectionner un mode de paiement: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Paiement à la livraison</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Paiement en ligne</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Paiement à la livraison</h6>
                                            <hr/>
                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                <span wire:loading.remove wire:target="codOrder()">
                                                    Passer la commande
                                                </span>

                                                <span wire:loading wire:target="codOrder()">
                                                    Commande en cour
                                                </span>
                                            </button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Mode de paiement en ligne</h6>
                                            <hr/>
                                            {{-- <button wire:loading.attr="disabled" type="button" class="btn btn-warning">Payer maintenant (Paiement en ligne)</button> --}}
                                            <div>
                                                <div id="paypal-button-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @else
                <div class="card card-body shadow text-center p-md-5">
                    <h4>
                        vous n'avez aucun article dans votre panier pour passer à la commande
                    </h4>
                    <a href="{{url('/collections')}}" class="btn btn-warning">Achetez ici !</a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')

    <script src="https://www.paypal.com/sdk/js?client-id=AZAYA_nwYCIgtQqFR5qDqZhgzZtvSax-mfvN-eyC_9yTIdKQVSVWVj3QCJxaAK43lQ_MWC3-q_LoOSqF&currency=USD"></script>

    <script>
        paypal.Buttons({
        // onClick is called when the button is clicked
        onClick: function()  {
            // Show a validation error if the checkbox is not checked
            if (!document.getElementById('nom').value
                || !document.getElementById('prenom').value
                || !document.getElementById('telephone').value
                || !document.getElementById('email').value
                || !document.getElementById('pincode').value
                || !document.getElementById('adresse').value
            )
            {
                Livewire.emit('validationForm');
                return false;
            }else
            {
                @this.set('nom', document.getElementById('nom').value);
                @this.set('prenom', document.getElementById('prenom').value);
                @this.set('telephone', document.getElementById('telephone').value);
                @this.set('email', document.getElementById('email').value);
                @this.set('pincode', document.getElementById('pincode').value);
                @this.set('adresse', document.getElementById('adresse').value);
            }
        },

        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
            purchase_units: [{
                amount: {
                value: {{$this->totalProductAmont}} // Can also reference a variable or function
                }
            }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            if(transaction.status == "COMPLETED"){
                Livewire.emit('transactionEmit', transaction.id);
            }

            //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            });
        }
        }).render('#paypal-button-container');
    </script>

@endpush
