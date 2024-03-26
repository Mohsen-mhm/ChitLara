<x-email-template>
    <x-slot name="name">
        {{ $name }}
    </x-slot>

    <x-slot name="title">
        This is your recovery link button
    </x-slot>

    <x-slot name="email">
        {{ $email }}
    </x-slot>

    <x-slot name="content">
        <form id="button-link" action="{{ route('change.password', $code) }}" method="GET">
            @csrf
            <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($email) }}" name="hash">
            <input type="hidden" value="{{ $code }}" name="code">
            <button type="submit" onclick="submitForm(event, 'button-link')"
                    class="px-6 py-2 my-6 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Change password
            </button>
        </form>

        <p class="my-4 leading-loose text-gray-600 dark:text-gray-300">
            This link will only be valid for the next {{ \App\Models\Verification::EXPIRE_TIME }} minutes. If the button
            does not work, you can use this recovery link:
        </p>

        <form id="text-link" action="{{ route('change.password', $code) }}" method="GET">
            @csrf
            <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($email) }}" name="hash">
            <input type="hidden" value="{{ $code }}" name="code">
            <button type="submit" onclick="submitForm(event, 'text-link')"
                    class="text-blue-600 hover:underline dark:text-blue-400 text-sm">
                {{ route('change.password', $code) }}
            </button>
        </form>
    </x-slot>
</x-email-template>
