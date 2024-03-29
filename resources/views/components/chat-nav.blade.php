<div
    class="flex justify-start items-center border-b border-gray-500 dark:border-gray-600 pb-2 mb-2">
    <div
        class="lg:hidden p-2 group mr-5 border border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition rounded-xl cursor-pointer"
        id="drawer-chat-list-toggle">
        <svg
            class="w-8 h-8 transition text-purple-800 dark:text-purple-600 group group-hover:text-purple-900 dark:group-hover:text-purple-500"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                  d="M5 7h14M5 12h14M5 17h10"/>
        </svg>
    </div>
    {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
    <div class="flex flex-col justify-center items-start ml-4">
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white transition">Bonnie
            Green</h1>
        <h1 class="text-sm text-gray-700 dark:text-gray-400 transition">Last seen 15:45</h1>
    </div>
</div>
