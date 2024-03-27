<div class="text-center hidden">
    <button type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe"
            data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[70px]"
            aria-controls="drawer-swipe"></button>
</div>
<div id="drawer-swipe"
     class="fixed z-50 w-full overflow-y-auto bg-white border-t border-gray-500 rounded-t-lg dark:border-gray-700 dark:bg-gray-800 transition-transform left-0 right-0 translate-y-full bottom-[70px]"
     tabindex="-1" aria-labelledby="drawer-swipe-label">
    <div
        class="flex flex-col justify-center items-center p-4 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 transition"
        data-drawer-toggle="drawer-swipe">
        <span class="absolute w-14 h-1 -translate-x-1/2 bg-gray-400 rounded-lg top-3 left-1/2 dark:bg-gray-500"></span>
        <h5 id="drawer-swipe-label"
            class="inline-flex items-center text-base text-gray-500 dark:text-gray-400 font-medium mt-3">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 18 18">
                <path
                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10ZM17 13h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2Z"/>
            </svg>
            {{ __('title.widgets') }}
        </h5>
    </div>
    <div class="grid grid-cols-3 gap-4 p-4">
        <a href=""
            class="p-4 rounded-lg cursor-pointer transition border border-gray-300 dark:border-gray-600 bg-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 dark:bg-gray-700">
            <div
                class="flex justify-center items-center mx-auto mb-2 rounded-full w-[48px] h-[48px] max-w-[48px] max-h-[48px]">
                {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
            </div>
            <div class="font-medium text-center text-gray-600 dark:text-gray-300">{{ __('title.profile') }}</div>
        </a>
        <a href=""
            class="p-4 rounded-lg cursor-pointer transition border border-gray-300 dark:border-gray-600 bg-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 dark:bg-gray-700">
            <div
                class="flex justify-center items-center mx-auto mb-2 rounded-full w-[48px] h-[48px] max-w-[48px] max-h-[48px]">
                {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
            </div>
            <div class="font-medium text-center text-gray-600 dark:text-gray-300">{{ __('title.profile') }}</div>
        </a>
        <a href=""
            class="p-4 rounded-lg cursor-pointer transition border border-gray-300 dark:border-gray-600 bg-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 dark:bg-gray-700">
            <div
                class="flex justify-center items-center mx-auto mb-2 rounded-full w-[48px] h-[48px] max-w-[48px] max-h-[48px]">
                {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
            </div>
            <div class="font-medium text-center text-gray-600 dark:text-gray-300">{{ __('title.profile') }}</div>
        </a>
    </div>
</div>
