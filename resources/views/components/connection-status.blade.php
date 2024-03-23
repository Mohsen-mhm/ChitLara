<div class="flex justify-center items-center">
    <svg data-popover-target="popover-online" data-popover-placement="left" id="online"
         class="w-6 h-6 text-gray-400 cursor-pointer hidden"
         aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
         width="24"
         height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd"
              d="M8.64 4.737A7.97 7.97 0 0 1 12 4a7.997 7.997 0 0 1 6.933 4.006h-.738c-.65 0-1.177.25-1.177.9 0 .33 0 2.04-2.026 2.008-1.972 0-1.972-1.732-1.972-2.008 0-1.429-.787-1.65-1.752-1.923-.374-.105-.774-.218-1.166-.411-1.004-.497-1.347-1.183-1.461-1.835ZM6 4a10.06 10.06 0 0 0-2.812 3.27A9.956 9.956 0 0 0 2 12c0 5.289 4.106 9.619 9.304 9.976l.054.004a10.12 10.12 0 0 0 1.155.007h.002a10.024 10.024 0 0 0 1.5-.19 9.925 9.925 0 0 0 2.259-.754 10.041 10.041 0 0 0 4.987-5.263A9.917 9.917 0 0 0 22 12a10.025 10.025 0 0 0-.315-2.5A10.001 10.001 0 0 0 12 2a9.964 9.964 0 0 0-6 2Zm13.372 11.113a2.575 2.575 0 0 0-.75-.112h-.217A3.405 3.405 0 0 0 15 18.405v1.014a8.027 8.027 0 0 0 4.372-4.307ZM12.114 20H12A8 8 0 0 1 5.1 7.95c.95.541 1.421 1.537 1.835 2.415.209.441.403.853.637 1.162.54.712 1.063 1.019 1.591 1.328.52.305 1.047.613 1.6 1.316 1.44 1.825 1.419 4.366 1.35 5.828Z"
              clip-rule="evenodd"/>
    </svg>
    <svg data-popover-target="popover-offline" data-popover-placement="left"
         class="w-6 h-6 text-red-600 cursor-pointer hidden" title="offline"
         id="offline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
         width="24"
         height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
    </svg>
    <div data-popover id="popover-online" role="tooltip"
         class="absolute z-10 invisible inline-block w-auto p-2 font-bold text-sm text-gray-700 transition-opacity duration-300 bg-white border border-gray-400 rounded-lg shadow-sm opacity-0 dark:text-gray-200 dark:border-gray-500 dark:bg-gray-800">
    </div>
    <div data-popover id="popover-offline" role="tooltip"
         class="absolute z-10 invisible inline-block w-auto p-2 font-bold text-sm text-gray-700 transition-opacity duration-300 bg-white border border-gray-400 rounded-lg shadow-sm opacity-0 dark:text-gray-200 dark:border-gray-500 dark:bg-gray-800">
    </div>
    <script>
        function updateSpeedState() {
            if (navigator.connection) {
                const online = document.getElementById('online');
                const offline = document.getElementById('offline');
                if (navigator.onLine) {
                    online.classList.remove('hidden');
                    offline.classList.add('hidden');

                    const downloadSpeed = navigator.connection.downlink;

                    if (downloadSpeed >= 0.7) {
                        online.classList.remove('text-red-400', 'text-orange-400');
                        online.classList.add('text-green-400');
                        document.getElementById('popover-online').innerHTML = 'Stable Connection'
                    } else {
                        online.classList.remove('text-green-400', 'text-orange-400');
                        online.classList.add('text-red-400');
                        document.getElementById('popover-online').innerHTML = 'Weak Connection'
                    }
                } else {
                    offline.classList.remove('hidden');
                    online.classList.add('hidden');
                    const speedState = document.getElementById('speedState');
                    document.getElementById('popover-offline').innerHTML = 'Offline'
                }
            } else {
                const speedState = document.getElementById('speedState');
                speedState.textContent = 'navigator.connection API not supported.';
            }
        }

        window.addEventListener('load', updateSpeedState);
        window.addEventListener('online', updateSpeedState);
        window.addEventListener('offline', updateSpeedState);
    </script>
</div>

