<div class="flex items-end my-2">
    {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
    <div
        class="flex flex-col relative w-full max-w-[250px] leading-1.5 transition p-4 ml-2 border-gray-200 bg-indigo-700 hover:bg-indigo-800 dark:hover:bg-indigo-800 rounded-xl rounded-es-none">
        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                        <span
                                            class="text-sm font-semibold text-yellow-300 dark:text-yellow-300">Bonnie Green</span>
        </div>
        <p class="text-sm font-normal py-2.5 text-white dark:text-gray-100">
            That's awesome. I think our users will really appreciate the improvements.
        </p>
        <span
            class="absolute bottom-1 right-2 text-sm font-normal text-gray-50 dark:text-gray-200">11:46</span>
    </div>
</div>
