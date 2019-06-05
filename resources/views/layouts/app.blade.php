<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/phone/css/intlTelInput.css')}}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a  href="/" class="navbar-brand" style="font-size: large; font-weight: bold;">
                    <img src="{{asset ('/images/logo.png')}}" width="48px"/>  Support Tickets</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a href="/">Home</a></li>
                        @if (Auth::check())
                        <li class="active"><a href="/tickets/create" >Create a Ticket</a></li>
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tickets
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('all_tickets')}}">All Tickets</a></li>
                                <li><a class="dropdown-item" href="{{route('pending_tickets')}}">Pending Tickets</a></li>
                                <li><a class="dropdown-item" href="{{route('answered_tickets')}}">Answered Tickets</a></li>
                                <li><a class="dropdown-item" href="{{route('solved_tickets')}}">Solved Tickets</a></li>
                            </ul>
                         </li>
                         @endif
                        <li><a href="{{route('downloads')}}">Downloads</a></li>
                        <li><a href="{{route('kcenter')}}">Knowledge Center</a></li>
                        <li><a href="{{route('contactus')}}">Contact Us</a></li>


                    </ul>
                    <!-- Right Side Of Navbar -->
                 <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @include('tickets.notifications')

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{asset('images/avatars/'.Auth::user()->avatar)}}" style="width:35px;margin-top: -10px;" class="img-fluid rounded-circle" alt="">

                                    Welcome , {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('profile')}}"><i class="fa fa-user "></i>&nbsp; My profile</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp;
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <audio id="notifiy_sound" >
    <source src="{{asset('assets/new.mp3')}}" type="audio/mpeg" >
      </audio>

<script defer src="{{asset('js/notifiy.js')}}"></script>
</body>
</html>
