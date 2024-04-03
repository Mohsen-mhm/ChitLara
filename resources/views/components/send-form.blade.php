<div class="mx-auto">
    <label for="message-input" class="sr-only">Your message</label>
    <div x-data="{ emojiBoxOpen: false, tooltipHover: false }"
         class="relative flex items-center py-2 px-3 bg-gray-100 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800">
        <button type="button"
                class="inline-flex justify-center transition p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        <button type="button" @mouseenter="emojiBoxOpen = true" @mouseleave="emojiBoxOpen = false"
                class="p-2 text-gray-500 transition rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14.99 9H15M8.99 9H9m12 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM7 13c0 1 .507 2.397 1.494 3.216a5.5 5.5 0 0 0 7.022 0C16.503 15.397 17 14 17 13c0 0-1.99 1-4.995 1S7 13 7 13Z"/>
            </svg>
        </button>
        <div x-show="emojiBoxOpen || tooltipHover" x-cloak
             class="absolute bottom-12 p-2 pb-0 z-10 transition-opacity duration-300"
             @mouseenter="tooltipHover = true" @mouseleave="tooltipHover = false">
            <emoji-picker></emoji-picker>
        </div>
        <textarea rows="1" name="message" id="message-input"
                  class="block mx-4 transition p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                  placeholder="Your message..."></textarea>
        <button type="button" id="send-message"
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
    <script>
        document.getElementById('send-message').addEventListener('click', function () {
            let message = encodeURIComponent(document.getElementById('message-input').value)
            fetchData('{{ route('message.sent') }}', 'POST', {message: message}).then((response) => {
                let activeBox = document.getElementById('overflowed-active-box');
                if (activeBox) {
                    smoothScrollToBottom(activeBox, 500);
                }
            })
        })
    </script>
</div>
