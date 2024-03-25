<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME', 'ChitLara') }}</title>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="transition bg-gray-100 dark:bg-gray-900">
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
</body>
</html>
