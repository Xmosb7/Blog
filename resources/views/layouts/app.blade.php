<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">


</head>
<body>
<div id="app">
    <div id="left_side" class="left_side">
        <div class="logos">
            <p onclick="location.href='{{ url('/') }}'" style="cursor: pointer;font-size: 1.2vw"
               class="h25">{{ config('app.name', 'Laravel') }}</p>
            <div onclick="location.href='#'" style="cursor: pointer;" class="h15" role="tooltip" aria-hidden="false"
                 aria-describedby="1" aria-labelledby="1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home">
                    <path
                        d="M4.5 10.75v10.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-5.5c0-.14.11-.25.25-.25h3.5c.14 0 .25.11.25.25v5.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-10.5M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div onclick="location.href='#'" style="cursor: pointer;" class="h15" role="tooltip" aria-hidden="false"
                 aria-describedby="5" aria-labelledby="5">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Write">
                    <path
                        d="M14 4a.5.5 0 0 0 0-1v1zm7 6a.5.5 0 0 0-1 0h1zm-7-7H4v1h10V3zM3 4v16h1V4H3zm1 17h16v-1H4v1zm17-1V10h-1v10h1zm-1 1a1 1 0 0 0 1-1h-1v1zM3 20a1 1 0 0 0 1 1v-1H3zM4 3a1 1 0 0 0-1 1h1V3z"
                        fill="currentColor"></path>
                    <path
                        d="M17.5 4.5l-8.46 8.46a.25.25 0 0 0-.06.1l-.82 2.47c-.07.2.12.38.31.31l2.47-.82a.25.25 0 0 0 .1-.06L19.5 6.5m-2-2l2.32-2.32c.1-.1.26-.1.36 0l1.64 1.64c.1.1.1.26 0 .36L19.5 6.5m-2-2l2 2"
                        stroke="currentColor">
                    </path>
                </svg>
            </div>
            <div onclick="location.href='#'" style="cursor: pointer;" class="h15">
                <img alt="Profile" class="l ci gk si sj go" src="/contact.jpg" width="32" height="32">
            </div>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" style="display: block;font-size: 1vw;margin-bottom: 2%;color: black">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="display: block;font-size: 0.8vw;margin-bottom: 2%;color: black">{{ __('Register') }}</a>
                @endif
            @else
                <a style="display: block;margin-bottom: 25%;">
                    <img alt="Profile" src="/profile.jpg" width="35" height="35">
                </a>
                <div>
                    <a style="display: block;font-size: 0.8vw;margin-bottom: 2%;color: black" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>

    </div>


    <main class="py-4" style="padding-top: 5%">
        @yield('content')
    </main>
</div>
</body>
</html>
