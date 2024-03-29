<div class="h-full overflow-auto pr-2">
    <div
        class="flex items-start bg-indigo-700 hover:-translate-x-0.5 transition p-2 mb-2 rounded-lg gap-2.5 cursor-pointer">
        {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
        <div class="relative flex flex-col w-full max-w-[250px] leading-1.5">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="text-sm font-semibold text-yellow-300 dark:text-yellow-300">{{ auth()->user()->name }}</span>
            </div>
            <p class="text-sm font-normal py-2.5 text-white dark:text-gray-100">
                That's awesome. I think our users will really appreciate the improvements.
            </p>
            <span
                class="absolute bottom-0 right-0 text-sm font-normal text-gray-50 dark:text-gray-200">11:46</span>
        </div>
    </div>
</div>
