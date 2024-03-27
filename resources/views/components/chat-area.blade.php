<div class="w-full h-full">
    <div class="border border-gray-500 dark:border-gray-700 rounded-xl m-auto w-11/12 h-full flex flex-col mt-10">

        <div class="relative flex flex-col p-5">

            <div id="drawer-chat-list"
                 class="lg:hidden absolute top-0 -left-20 z-40 h-full p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800 rounded-s-xl border-r border-gray-500 dark:border-gray-700"
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
                    <div class="pb-6 pr-2">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-indigo-800 dark:text-indigo-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                          d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="search"
                                   class="bg-gray-100 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                   placeholder="Search Chat" required/>
                        </div>
                    </div>

                    {{-- All chats list --}}
                    <div class="h-full overflow-auto pr-2">
                        <div
                            class="flex items-start bg-indigo-700 hover:-translate-x-0.5 transition p-2 mb-2 rounded-lg gap-2.5 cursor-pointer">
                            {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
                            <div class="relative flex flex-col w-full max-w-[400px] leading-1.5">
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
                    {{-- End all chats list --}}
                </div>
            </div>
            <div class="flex h-full">
                <div class="hidden lg:flex w-1/3 flex-col pr-1 mr-3 border-r border-gray-500 dark:border-gray-700">
                    <h1 class="mb-2 text-3xl font-semibold text-indigo-600 dark:text-yellow-400">{{ env('APP_NAME') }}</h1>
                    <div class="pb-6 pr-2">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-indigo-800 dark:text-indigo-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                          d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="search"
                                   class="bg-gray-100 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                   placeholder="Search Chat" required/>
                        </div>
                    </div>

                    {{-- All chats list --}}
                    <div class="h-full overflow-auto pr-2">
                        <div
                            class="flex items-start bg-indigo-700 hover:-translate-x-0.5 transition p-2 mb-2 rounded-lg gap-2.5 cursor-pointer">
                            {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
                            <div class="relative flex flex-col w-full max-w-[400px] leading-1.5">
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
                    {{-- End all chats list --}}
                </div>

                <div class="w-full flex flex-col">
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
                    <div class="w-full">
                        <div class="overflow-auto h-[600px]">
                            {{-- Active group bubbles --}}
                            <div class="flex items-end my-2">
                                {!! \App\Helper\Helper::generateAvatar(auth()->user()->username, auth()->user()->avatar) !!}
                                <div
                                    class="flex flex-col relative w-full max-w-[400px] leading-1.5 transition p-4 ml-2 border-gray-200 bg-indigo-700 hover:bg-indigo-800 dark:hover:bg-indigo-800 rounded-xl rounded-es-none">
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
                            <div class="flex items-start my-2" dir="rtl">
                                <div
                                    class="relative flex flex-col w-full max-w-[400px] leading-1.5 transition px-4 border-gray-200 bg-indigo-700 hover:bg-indigo-800 dark:hover:bg-indigo-800 rounded-xl rounded-es-none">

                                    <p dir="ltr" class="text-sm font-normal py-2.5 text-white dark:text-gray-100">
                                        That's awesome. I think our users will really appreciate the improvements.
                                    </p>
                                    <span
                                        class="absolute bottom-1 right-2 text-sm font-normal text-gray-50 dark:text-gray-200">11:46</span>
                                </div>
                            </div>
                            {{-- End active group bubbles --}}

                            {{-- Active private chat bubbles --}}
                            <div class="flex items-start my-2">
                                <div
                                    class="relative flex flex-col w-full max-w-[400px] leading-1.5 transition px-4 border-gray-200 bg-indigo-700 hover:bg-indigo-800 dark:hover:bg-indigo-800 rounded-xl rounded-es-none">

                                    <p class="text-sm font-normal py-2.5 text-white dark:text-gray-100">
                                        That's awesome. I think our users will really appreciate the improvements.
                                    </p>
                                    <span
                                        class="absolute bottom-1 right-2 text-sm font-normal text-gray-50 dark:text-gray-200">11:46</span>
                                </div>
                            </div>
                            <div class="flex items-start my-2" dir="rtl">
                                <div
                                    class="relative flex flex-col w-full max-w-[400px] leading-1.5 transition px-4 border-gray-200 bg-indigo-700 hover:bg-indigo-800 dark:hover:bg-indigo-800 rounded-xl rounded-es-none">

                                    <p dir="ltr" class="text-sm font-normal py-2.5 text-white dark:text-gray-100">
                                        That's awesome. I think our users will really appreciate the improvements.
                                    </p>
                                    <span
                                        class="absolute bottom-1 right-2 text-sm font-normal text-gray-50 dark:text-gray-200">11:46</span>
                                </div>
                            </div>
                            {{-- End active private chat bubbles --}}

                        </div>

                        <form class="mx-auto">
                            <label for="chat" class="sr-only">Your message</label>
                            <div
                                class="flex items-center py-2 px-3 bg-gray-100 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800">
                                <button type="button"
                                        class="inline-flex justify-center transition p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <button type="button"
                                        class="p-2 text-gray-500 transition rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <textarea id="chat" rows="1" name="message"
                                          class="block mx-4 transition p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                          placeholder="Your message..."></textarea>
                                <button type="submit"
                                        class="inline-flex group transition justify-center p-2 text-purple-600 rounded-full cursor-pointer hover:bg-purple-100 dark:text-purple-500 dark:hover:bg-gray-700">
                                    <svg
                                        class="w-6 h-6 rotate-90 transition group group-hover:translate-x-0.5 group-hover:text-purple-600"
                                        fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
