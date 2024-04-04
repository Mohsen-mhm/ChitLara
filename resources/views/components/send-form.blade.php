<div class="mx-auto">
    <label for="message-input" class="sr-only">Your message</label>
    <div x-data="{ emojiBoxOpen: false, tooltipHover: false, fileUploadOpen: false, uploadItemsHover: false }"
         class="relative flex items-center py-2 px-3 bg-gray-100 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800">
        <button type="button" @mouseenter="fileUploadOpen = true" @mouseleave="fileUploadOpen = false"
                class="inline-flex justify-center transition p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 8v8a5 5 0 1 0 10 0V6.5a3.5 3.5 0 1 0-7 0V15a2 2 0 0 0 4 0V8"/>
            </svg>
        </button>

        <div x-show="fileUploadOpen || uploadItemsHover" x-cloak
             class="absolute bottom-12 left-0 p-2 pb-5 z-20 transition-opacity duration-300"
             @mouseenter="uploadItemsHover = true" @mouseleave="uploadItemsHover = false"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="opacity-0 transform translate-y-0"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-0">
            <div class="w-12 flex flex-col cursor-default justify-center items-center space-y-3">
                <button type="button" id="fileButton"
                        class="inline-flex justify-center transition p-2 cursor-pointer bg-gray-100 border border-gray-300 dark:border-gray-600 rounded-full dark:bg-gray-800">
                    <svg class="w-6 h-6 text-indigo-700 dark:text-indigo-600" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 3v4a1 1 0 0 1-1 1H5m4 6 2 2 4-4m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                    </svg>
                </button>
                <button type="button" id="imageButton"
                        class="inline-flex justify-center transition p-2 cursor-pointer bg-gray-100 border border-gray-300 dark:border-gray-600 rounded-full dark:bg-gray-800">
                    <svg class="w-6 h-6 text-indigo-700 dark:text-indigo-600" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Hidden file input -->
        <input type="file" id="fileInput" class="hidden">
        <input type="file" id="imageInput" class="hidden">

        <!-- Preview container -->
        <div id="previewContainer"
             class="hidden flex justify-center items-center space-x-6 w-full absolute bottom-16 left-0 p-4 bg-gray-100 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800">
            <div class="absolute top-3 left-3 p-2 bg-gray-200 dark:bg-gray-900 cursor-pointer rounded-full"
                 onclick="resetInputs()">
                <svg class="w-6 h-6 ml-[-1px] text-indigo-700 dark:text-indigo-600" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
            </div>
            <div id="filePreview" class="flex items-center">
                <div id="fileIcon"
                     class="w-auto h-16 min-w-16 border border-yellow-400 rounded-lg flex items-center justify-center">
                </div>
                <div id="fileInfo" class="ml-4">
                    <span id="fileName" class="block font-medium text-gray-800 dark:text-white"></span>
                    <span id="fileSize" class="block text-sm text-gray-600 dark:text-gray-300"></span>
                </div>
            </div>
        </div>

        <button type="button" @mouseenter="emojiBoxOpen = true" @mouseleave="emojiBoxOpen = false"
                class="p-2 text-gray-500 transition rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14.99 9H15M8.99 9H9m12 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM7 13c0 1 .507 2.397 1.494 3.216a5.5 5.5 0 0 0 7.022 0C16.503 15.397 17 14 17 13c0 0-1.99 1-4.995 1S7 13 7 13Z"/>
            </svg>
        </button>
        <div x-show="emojiBoxOpen || tooltipHover" x-cloak
             class="absolute bottom-12 p-2 pb-3 z-10 transition-opacity duration-300"
             @mouseenter="tooltipHover = true" @mouseleave="tooltipHover = false"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="opacity-0 transform translate-y-0"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-0">
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
        const fileButton = document.getElementById('fileButton');
        const imageButton = document.getElementById('imageButton');
        const fileInput = document.getElementById('fileInput');
        const imageInput = document.getElementById('imageInput');
        const previewContainer = document.getElementById('previewContainer');
        const filePreview = document.getElementById('filePreview');
        const fileIcon = document.getElementById('fileIcon');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');

        function handleInputChange(input, button, type) {
            button.addEventListener('click', () => {
                resetInputs();
                input.click();
            });

            input.addEventListener('change', () => {
                const file = input.files[0];
                if (file) {
                    // Set file name and size
                    fileName.textContent = file.name;
                    if (file.size > 1048576) {
                        fileSize.textContent = `${(file.size / 1048576).toFixed(2)} MB`;
                    } else {
                        fileSize.textContent = `${(file.size / 1024).toFixed(2)} KB`;
                    }

                    if (type === 'file') {
                        fileIcon.innerHTML = `
                                <svg class="w-10 h-10 text-indigo-700 dark:text-indigo-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 6 2 2 4-4m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                                </svg>
                            `;
                    } else if (type === 'image') {
                        const reader = new FileReader();
                        reader.onload = () => {
                            fileIcon.innerHTML = `<img src="${reader.result}" alt="Preview" class="w-full h-full rounded-lg">`;
                        };
                        reader.readAsDataURL(file);
                    }
                    previewContainer.classList.remove('hidden');
                    return input.files[0]
                } else {
                    previewContainer.classList.add('hidden');
                    return null
                }
            });
        }

        function resetInputs() {
            fileInput.value = '';
            imageInput.value = '';
            previewContainer.classList.add('hidden');
        }

        handleInputChange(imageInput, imageButton, 'image');
        handleInputChange(fileInput, fileButton, 'file');

        document.getElementById('send-message').addEventListener('click', function () {
            let message = encodeURIComponent(document.getElementById('message-input').value)
            let formData = new FormData();
            formData.append('message', message);
            let fileType = null;

            if (imageInput.files[0]) {
                formData.append('file', imageInput.files[0])
                formData.append('fileType', 'image')
            } else if (fileInput.files[0]) {
                formData.append('file', fileInput.files[0])
                formData.append('fileType', 'file')
            }

            fetch('{{ route('message.sent') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData,
            }).then(response => {
                if (!response.ok) {
                    throw new Error(`${response.status}`);
                }
                return response.json();
            }).then(data => {
                let activeBox = document.getElementById('overflowed-active-box');
                if (activeBox) {
                    smoothScrollToBottom(activeBox, 500);
                }
                resetInputs();
            }).catch((error) => {
                if (error.message === '422') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-start",
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        text: 'A message is required if no file is uploaded'
                    });
                }
            });
        });
    </script>
</div>
