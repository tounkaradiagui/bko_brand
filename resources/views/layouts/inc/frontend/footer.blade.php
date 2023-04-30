<div>
    <div class="footer-area ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="footer-heading">{{$appSetting->website_name ?? 'Diagui Shop'}}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Chez Diagui-Shop.com, nous sommes fiers de vous offrir la meilleure expérience de shopping en ligne possible, avec des produits de
                     qualité supérieure, des prix abordables et un service clientèle exceptionnel. Nous sommes impatients de vous aider à trouver ce que
                      vous cherchez et de vous offrir une expérience de shopping en ligne inoubliable.
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
                            <i class="fa fa-map-marker"></i> {{$appSetting->adresse ?? 'Faladié Socoro'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="tel:$appSetting->phone1" class="text-white">
                            <i class="fa fa-phone"></i> {{$appSetting->phone1 ?? '+223 76 29 22 70'}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="mailto:$appSetting->email1" class="text-white">
                            <i class="fa fa-envelope"></i> {{$appSetting->email1 ?? 'tounkaradiagui@gmail.com'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - Diagui-Shop. Tous Droit Reservés.</p>
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
