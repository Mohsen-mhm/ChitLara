@vite(['resources/css/app.css','resources/js/app.js'])

<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    <header>
        <a href="{{ route('home') }}">
            <img class="w-auto h-7 sm:h-8" src="{{ asset('assets/img/chitlara-logo.png') }}" alt="">
        </a>
    </header>

    <main class="mt-8">
        <h2 class="text-gray-700 dark:text-gray-200">Hi {{ $name }},</h2>

        <p class="my-2 leading-loose text-gray-600 dark:text-gray-300">
            {{ $title }}:
        </p>

        {{ $content }}

        <p class="my-8 text-gray-600 dark:text-gray-300">
            Thanks, <br>
            {{ env('APP_NAME') }} team
        </p>

        <script>
            function submitForm(event, id) {
                event.preventDefault();
                window.open(document.getElementById(id).getAttribute('action'), '_blank');
            }
        </script>
    </main>


    <footer class="my-8">
        <p class="text-gray-500 dark:text-gray-400">
            This email was sent to <a href="#" class="text-blue-600 hover:underline dark:text-blue-400"
                                      target="_blank">{{ $email }}</a>.
        </p>

        <p class="my-3 text-gray-500 dark:text-gray-400">© {{ now()->year }} {{ env('APP_NAME') }}. All Rights
            Reserved.</p>
    </footer>
</section>
