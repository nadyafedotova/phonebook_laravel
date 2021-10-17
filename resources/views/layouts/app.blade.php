<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Phone book</title>

        {{-- Fonts --}}
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        {{-- Scripts --}}
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>

    </head>
<body>
<div class="container-fluid">
    <div class="py-5 position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/admin/phone') }}">@lang('layouts_app.dashboard')</a>
                @else
                    <a href="{{ route('login') }}">@lang('layouts_app.login')</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">@lang('layouts_app.register')</a>
                    @endif
                @endauth
            </div>
        @endif


        <main class="py-4 content flex-center">
            @yield('content')
        </main>


    </div>
</div>
</body>
</html>
