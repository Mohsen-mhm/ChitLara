<div class="w-full h-full">
    <div class="border border-gray-500 dark:border-gray-700 rounded-xl m-auto w-11/12 h-full flex flex-col mt-10">

        <div class="relative flex flex-col p-5">

            <div id="drawer-chat-list"
                 class="lg:hidden absolute top-0 z-40 h-full p-4 overflow-y-auto transition-transform -translate-x-[250%] bg-white w-80 dark:bg-gray-800 rounded-s-xl border-r border-gray-500 dark:border-gray-700"
                 tabindex="-1">
                <button type="button" id="drawer-hide-button" aria-controls="drawer-chat-list"
                        class="p-2 group border border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition rounded-xl cursor-pointer absolute top-4 end-2.5 flex items-center justify-center">
                    <svg
                        class="w-3.5 h-3.5 transition text-purple-800 dark:text-purple-600 group group-hover:text-purple-900 dark:group-hover:text-purple-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>

                <div class="w-full flex-col">
                    <h1 class="mb-2 text-3xl font-semibold text-indigo-600 dark:text-yellow-400">{{ env('APP_NAME') }}</h1>

                    <x-search-chats/>

                    {{-- All chats list --}}
                    <x-all-chats/>
                    {{-- End all chats list --}}
                </div>
            </div>
            <div class="flex h-full">
                <div class="hidden lg:flex w-1/3 flex-col pr-1 mr-3 border-r border-gray-500 dark:border-gray-700">
                    <h1 class="mb-2 text-3xl font-semibold text-indigo-600 dark:text-yellow-400">{{ env('APP_NAME') }}</h1>

                    <x-search-chats/>

                    {{-- All chats list --}}
                    <x-all-chats/>
                    {{-- End all chats list --}}
                </div>

                <x-active-box/>
            </div>
        </div>
    </div>
</div>
