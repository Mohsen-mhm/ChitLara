<div data-dial-init class="fixed top-6 end-6 group" dir="ltr">
    <button type="button" data-dial-toggle="speed-dial-menu-top-right" aria-controls="speed-dial-menu-top-right"
            aria-expanded="false"
            class="flex items-center justify-center text-white bg-indigo-500 rounded-full w-11 h-11 hover:bg-indigo-600 dark:bg-indigo-400 dark:hover:bg-indigo-500 focus:ring-4 focus:ring-indigo-400 focus:outline-none dark:focus:ring-indigo-300 transition">
        <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 1v16M1 9h16"/>
        </svg>
        <span class="sr-only">Open actions menu</span>
    </button>
    <div id="speed-dial-menu-top-right" class="flex flex-col items-center hidden mt-4 space-y-2">
        <button type="button"
                class="flex justify-center items-center w-10 h-10 text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <x-connection-status/>
        </button>
        <button id="theme-toggle" type="button"
                class="flex justify-center items-center w-10 h-10 text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <x-theme-toggle/>
        </button>
    </div>
</div>
