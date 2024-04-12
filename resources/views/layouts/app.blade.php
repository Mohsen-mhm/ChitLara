<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME', 'ChitLara') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/chitlara-fav-logo.png') }}">

    <script>
        @guest
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
        @else
        if ({{ auth()->user()->getUserTheme() == 'dark' ? 1 : 0 }}) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }

        window.uuid = '{{ auth()->user()->uuid }}';
        window.groupUuid = '{{ auth()->user()->last_activity && (auth()->user()->last_activity->get('type') == \App\Models\Chit::TYPE_GROUP) ? auth()->user()->last_activity->get('id') : 0 }}';
        @endguest
    </script>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="transition bg-gray-50 dark:bg-gray-900">
@include('sweetalert::alert')

<x-dial-bar/>
<div class="w-full flex flex-col justify-center items-center px-4 py-16">
    @yield('content')
</div>

@guest
    <script src="{{ asset('assets/js/toggleTheme.js') }}"></script>
@else
    <script src="{{ asset('assets/js/authToggleTheme.js') }}"></script>
@endguest
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
