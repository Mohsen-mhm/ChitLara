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
            This is your verification link button:
        </p>

        <form id="button-link" action="{{ route('email.verify', $code) }}" method="GET">
            @csrf
            <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($email) }}" name="hash">
            <input type="hidden" value="{{ $code }}" name="code">
            <button type="submit" onclick="submitForm(event, 'button-link')"
                    class="px-6 py-2 my-6 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Verify email
            </button>
        </form>

        <p class="my-4 leading-loose text-gray-600 dark:text-gray-300">
            This link will only be valid for the next {{ \App\Models\Verification::EXPIRE_TIME }} minutes. If the button does not work, you can use this
            verification link:
        </p>

        <form id="text-link" action="{{ route('email.verify', $code) }}" method="GET">
            @csrf
            <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($email) }}" name="hash">
            <input type="hidden" value="{{ $code }}" name="code">
            <button type="submit" onclick="submitForm(event, 'text-link')"
                    class="text-blue-600 hover:underline dark:text-blue-400 text-sm">
                {{ route('email.verify', $code) }}
            </button>
        </form>

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
