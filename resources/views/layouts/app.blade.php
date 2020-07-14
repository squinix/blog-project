<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('stylesheets')

    <style>
        a {
            color: white;
        }

        a:hover {
            text-decoration: none;
            color: white;
        }

        thead tr th {
            text-transform: uppercase;
            font-weight: 600;
        }

        tbody tr th {
            color: rgba(0, 0, 0, 0.8);
            font-weight: 300;
        }

        .main_content {
            min-height: 100vh;
        }

        .button {
            background: #0ECE91;
            border-radius: 0;
            padding: 10px 20px 10px 20px;
            color: white!important;
            outline: none;
            text-decoration: none;
            text-transform: uppercase;
            border: none;
        }

        .button:hover {
            -webkit-transition: 0.5s;
            -moz-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
            -webkit-box-shadow: 0px 10px 35px -9px rgba(0,0,0,0.5);
            -moz-box-shadow: 0px 10px 35px -9px rgba(0,0,0,0.5);
            box-shadow: 0px 10px 35px -9px rgba(0,0,0,0.5);
        }

        .button:focus {
            border: none;
            outline: none;
            box-shadow: none;
        }

        .nav-link {
            text-transform: uppercase;
            color: #B7B7B7;
            font-size: 14px;
            padding-top: 17px;
            border-top: solid white 6px;
            height: 55px;
            cursor: pointer;
        }

        .nav-link.active {
            border-top: solid #0ECE91 6px;
            padding-top: 17px;
        }

        footer {
            background: #222831;
        }

        .page-link {
            color: #B7B7B7!important;
            border: none;
            font-size: 16px;
            font-weight: 600;
        }

        .active .page-link {
            background: #0ECE91!important;
            border-color: #0ECE91!important;
            color: white!important;
        }

        .active_filter {
            color: #0ECE91!important;
        }

        .section_title:after {
            position: absolute;
            content: "";
            width: 60px;
            height: 4px;
            left: calc(50% - 30px);
            bottom: 0;
            background: #0ECE91;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="main_content">
            <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top" style="padding-top: 0!important;">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto d-flex align-items-center">
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('blog')) ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ route('about') }}">O nás</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ route('contact.create') }}">Kontakt</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ (request()->is('customers')) ? 'active' : '' }}" href="{{ route('customers.index') }}">{{ __('Customers') }}</a>
                            </li> --}}
                            <li class="nav-item dropdown" style="margin-left: 20px;">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -5px;">
                                    <svg class="bi bi-list" width="28px" height="28px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    @guest
                                        <a class="dropdown-item" href="{{ route('login') }}">Přihlásit se</a>
                                        @if (Route::has('register'))
                                            <a class="dropdown-item" href="{{ route('register') }}">Registrovat se</a>
                                        @endif
                                    @else
                                        <a class="dropdown-item" href="{{ route('home') }}">{{ Auth::user()->name }}</a>
                                    
                                        @can('viewAny', App\Post::class)
                                            <a class="dropdown-item" href="{{ route('posts.index') }}">Články</a>
                                        @endcan
                                        @can('viewAny', App\Category::class)
                                            <a class="dropdown-item" href="{{ route('categories.index') }}">Kategorie</a>
                                        @endcan
                                        @can('viewAny', App\Tag::class)
                                            <a class="dropdown-item" href="{{ route('tags.index') }}">Tagy</a>
                                        @endcan
                                        
                                        <a  class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                Odhlásit se
                                        </a>
            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <footer class="footer mt-auto py-3 text-white">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-4 pr-5">
                        <h2 class="text-uppercase" style="font-weight: 900;">
                            Larav<span style="color: #0ECE91;">el</span>.
                        </h2>

                        <hr class="hr bg-white">

                        <small style="font-size: 13px;">
                            Of recommend residence education be on difficult repulsive offending. Judge views had mirth table seems great him for her. Alone all happy asked begin fully stand own get. Excuse ye seeing result of we.
                        </small>
                        <ul class="list-group list-group-horizontal mt-4 d-flex justify-content-start">
                            <li class="list-group-item rounded-circle mr-3">
                                <a href="#" class="text-dark">
                                    a
                                </a>
                            </li>
                            <li class="list-group-item rounded-circle mr-3">
                                <a href="#" class="text-dark">
                                    b
                                </a>
                            </li>
                            <li class="list-group-item rounded-circle">
                                <a href="#" class="text-dark">
                                    c
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-3 pr-3">
                        <h4>
                            Poslední příspěvky
                        </h4>
                        <div class="mt-4">
                            @foreach ($headerData as $data)
                                @if ($loop->index < 2)
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <img src="/storage/{{ $data->thumbnail }}" alt="{{ $data->title }}" width="80px" class="rounded">
                                        </div>
                                        <div class="col-md-auto">
                                            <a href="blog/{{ $data->id }}">
                                                <h6>
                                                    {{ $data->title }}
                                                </h6>    
                                            </a>
                                            <small style="font-size: 8px;color: #B7B7B7;">
                                                {{ $data->updated_at->format('d.m.Y') }}
                                            </small>
                                        </div>
                                    </div>
                                    @if ($loop->index < 1)
                                        <hr>
                                    @endif   
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2 pr-3">
                        <h4>
                            Odkazy
                        </h4>
                        <dl class="mt-4">
                            <dd>
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                                <a href="/">
                                    Úvodní strana
                                </a>
                            </dd>
                            <dd class="mt-3">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                                <a href="/glob">
                                    Blog
                                </a>
                            </dd>
                            <dd class="mt-3">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                                <a href="/about">
                                    O nás
                                </a>
                            </dd>
                            <dd class="mt-3">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                                <a href="/contact">
                                    Kontakt
                                </a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-3">
                        <h4>
                            Kontakt
                        </h4>
                        <ul class="mt-4 pl-0">
                            <li class="mt-3" style="display: table;">
                                <span style="width: 40px;display: table-cell;vertical-align: top;">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-geo" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path d="M7.5 4h1v9a.5.5 0 0 1-1 0V4z"/>
                                        <path fill-rule="evenodd" d="M6.489 12.095a.5.5 0 0 1-.383.594c-.565.123-1.003.292-1.286.472-.302.192-.32.321-.32.339 0 .013.005.085.146.21.14.124.372.26.701.382.655.246 1.593.408 2.653.408s1.998-.162 2.653-.408c.329-.123.56-.258.701-.382.14-.125.146-.197.146-.21 0-.018-.018-.147-.32-.339-.283-.18-.721-.35-1.286-.472a.5.5 0 1 1 .212-.977c.63.137 1.193.34 1.61.606.4.253.784.645.784 1.182 0 .402-.219.724-.483.958-.264.235-.618.423-1.013.57-.793.298-1.855.472-3.004.472s-2.21-.174-3.004-.471c-.395-.148-.749-.336-1.013-.571-.264-.234-.483-.556-.483-.958 0-.537.384-.929.783-1.182.418-.266.98-.47 1.611-.606a.5.5 0 0 1 .595.383z"/>
                                    </svg>    
                                </span>
                                <span>
                                    203 Fake St. Mountain View, San Francisco, California, USA
                                </span>
                            </li>
                            <li class="mt-4" style="display: table;">
                                <span style="width: 40px;display: table-cell;vertical-align: top;">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-telephone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.925 1.745a.636.636 0 0 0-.951-.059l-.97.97c-.453.453-.62 1.095-.421 1.658A16.47 16.47 0 0 0 5.49 10.51a16.471 16.471 0 0 0 6.196 3.907c.563.198 1.205.032 1.658-.421l.97-.97a.636.636 0 0 0-.06-.951l-2.162-1.682a.636.636 0 0 0-.544-.115l-2.052.513a1.636 1.636 0 0 1-1.554-.43L5.64 8.058a1.636 1.636 0 0 1-.43-1.554l.513-2.052a.636.636 0 0 0-.115-.544L3.925 1.745zM2.267.98a1.636 1.636 0 0 1 2.448.153l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                                    </svg>    
                                </span>
                                <span>
                                    +420 123 456 7889
                                </span>
                            </li>
                            <li class="mt-4" style="display: table;">
                                <span style="width: 40px;display: table-cell;vertical-align: top;">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                                    </svg>    
                                </span>
                                <span>
                                    test@test.com
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <hr class="hr">
                        <p class="text-center pt-3">
                            Copyright ©2020 All rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
    <script>
        jQuery(document).ready(function(e) {
            var header = $(".navbar");
            $(window).scroll(function() {    
                var scroll = $(window).scrollTop();
            
                if (scroll >= 50) {
                    header.addClass('shadow-sm');
                } else {
                    header.removeClass('shadow-sm');
                }
            });
        });
    </script>
</html>
