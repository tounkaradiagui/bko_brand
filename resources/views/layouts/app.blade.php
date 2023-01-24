<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="meta_description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="@yield('Diagui TOUNKARA')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- CSS --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{asset('admin/images/logogolden.png')}}" >
    
    {{--lien cdn alertify  --}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
    
    {{-- OWL Carroussel --}}
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

    {{-- Exzoom Product images Carroussel --}}
    <link rel="stylesheet" href="{{asset('assets/exzoom/jquery.exzoom.css')}}">

    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

    @livewireStyles
</head>
<body>
    <div id="app">

        @include('layouts.inc.frontend.navbar')

        <main>
            @yield('content')
        </main>
    </div>

    {{-- Lien Bootstrap et Jquery --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    {{-- OWL carroussel --}}
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    {{-- Exzoom Product Images Carroussel --}}
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>

    <!-- JavaScript alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        window.addEventListener('message', event => { 
            if(event.detail){
                alertify.set('notifier','position', 'top-right');
                alertify.notify(event.detail.text, event.detail.type);
            }    

        });
    </script>

    @yield('script')

    @livewireScripts
    @stack('scripts')

</body>
</html>
