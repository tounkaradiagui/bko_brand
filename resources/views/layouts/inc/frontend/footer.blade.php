<div>
    <div class="footer-area ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="footer-heading">{{$appSetting->website_name ?? 'Mon site web'}}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Sur Golden market vous pouvez également commander des produits au nom de vos amis en vous connectant à votre compte.
                        L'inscription ne prend que quelques secondes, allez-y !! inscrivez-vous pour faire du shopping au marché d'or. meilleur site de vente au Mali

                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Achetez Maintenant</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{url('/collections')}}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{url('/nouveaux-arrives')}}" class="text-white">Nouveautés</a></div>
                    <div class="mb-2"><a href="{{url('/produits-populaire')}}" class="text-white">En Vedette</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Nous Réjoindre</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$appSetting->adresse ?? 'Mon adresse'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{$appSetting->phone1 ?? 'Téléphone'}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{$appSetting->email1 ?? 'Mon adresse email'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - Golden - Market. Tous Droit Reservés.</p>
                </div>
                <div class="col-md-4">
                    {{-- <div class="social-media text-white">
                        Réseaux sociaux :
                        @if ($appSetting->facebook)
                            <a href="{{$appSetting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @else
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appSetting->twitter)
                            <a href="{{$appSetting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appSetting->instagram)
                            <a href="{{$appSetting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appSetting->youtube)
                            <a href="{{$appSetting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
