<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="/css/app.css" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <script src="https://kit.fontawesome.com/a8a0c121ea.js" crossorigin="anonymous"></script>
        

    </head>
    <body class="antialiased">

        <div id="app">

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Trustbox Test</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ request()->is('wall') ? 'active' : '' }}" href="{{ route('wall') }}">Social Wall</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav mb-2 mb-lg-0">
                    @auth
                        {{-- <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link"><i class="fa-solid fa-user"></i> My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                        </li> --}}
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                  </ul>
                </div>
              </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col mt-4">
                        @yield('page_contents')
                    </div>
                </div>
            </div>

        </div>

    <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
