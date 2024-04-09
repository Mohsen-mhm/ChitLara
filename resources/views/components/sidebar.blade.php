<div class="w-full h-full">
    <h1 class="text-3xl font-semibold text-indigo-600 dark:text-yellow-400">{{ env('APP_NAME') }}</h1>

    <div class="mb-3 mt-2">
        <x-groups.create/>
    </div>

    <x-search-chats/>

    {{-- All chats list --}}
    <x-all-chats/>
    {{-- End all chats list --}}
</div>
