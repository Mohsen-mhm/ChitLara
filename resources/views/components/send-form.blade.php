<div class="mx-auto">
    <label for="message-input" class="sr-only">Your message</label>
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
        <button type="button" data-popover-target="popover-emoji" data-popover-placement="bottom-end"
                class="p-2 text-gray-500 transition rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        <div data-popover id="popover-emoji" role="tooltip"
             class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
            <emoji-picker></emoji-picker>
            <script>
                document.querySelector('emoji-picker')
                    .addEventListener('emoji-click', event => document.getElementById('message-input').value += event.detail.unicode);
            </script>
            <div data-popper-arrow></div>
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
