<div class="w-full h-full">
    <h1 class="mb-2 text-3xl font-semibold text-indigo-600 dark:text-yellow-400">{{ env('APP_NAME') }}</h1>

    <x-search-chats/>

    {{-- All chats list --}}
    <x-all-chats/>
    {{-- End all chats list --}}
</div>
