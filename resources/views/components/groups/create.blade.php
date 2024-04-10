<div x-data="{ showCreateGroupModal: false, groupPopoverOpen: false, top: 'auto', left: 'auto' }">
    <!-- Button to toggle modal -->
    <svg @click="showCreateGroupModal = true" @mouseenter="groupPopoverOpen = true"
         @mouseleave="groupPopoverOpen = false"
         @mousemove="top = $event.clientY + 12 + 'px'; left = $event.clientX + 10 + 'px'"
         class="flex justify-center items-center transition w-10 h-10 cursor-pointer p-1 rounded-full text-indigo-500 hover:text-indigo-600 border border-indigo-500 hover:border-indigo-600 dark:border-indigo-600 shadow-sm dark:hover:text-indigo-500 dark:text-indigo-400"
         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
         viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
              d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
    </svg>
    <div x-show.transition.opacity="groupPopoverOpen"
         x-bind:style="{ top: top, left: left }"
         class="fixed w-auto px-3 py-2 font-bold text-sm text-gray-700 transition-opacity duration-300 bg-white border border-gray-400 rounded-lg shadow-sm dark:text-gray-200 dark:border-gray-500 dark:bg-gray-800 z-50">
        Create Group
    </div>
    <!-- Modal -->
    <div x-show="showCreateGroupModal" x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen"
             x-data="{ groupName: '', groupUsername: '', groupType: '0' }">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75 dark:bg-gray-900"
                     @click="showCreateGroupModal = false"></div>
            </div>
            <div
                class="bg-white dark:bg-gray-800 rounded-lg mx-3 overflow-hidden shadow-xl transform transition-all max-w-xl w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="w-full sm:flex sm:items-start">
                        <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h1 class="text-2xl font-semibold text-indigo-600 dark:text-yellow-400 text-center mb-5">
                                Create new group</h1>
                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <div class="w-full">
                                    <label for="name-input"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" id="name-input" name="name" x-model="groupName"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                           placeholder="Group name" required/>
                                </div>
                                <div class="w-full">
                                    <label for="username-input"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" id="username-input" name="username" x-model="groupUsername"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                           placeholder="Group username" required/>
                                </div>

                                <div id="error-container" class="text-red-600"></div>

                                <hr class="border-0 border-t border-gray-500">
                                <div class="w-full">
                                    <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Group type</h3>
                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                        <input type="checkbox" name="type" value="0" class="sr-only peer"
                                               id="type-input" x-model="groupType" required>
                                        <span
                                            class="me-3 text-sm font-medium flex justify-between items-center text-green-500 peer-checked:text-gray-500 transition">
                                            <svg class="w-6 h-6 me-2" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-width="2"
                                                      d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            Public
                                        </span>
                                        <div
                                            class="relative w-11 h-6 bg-green-500 rounded-full peer dark:bg-green-500 peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:peer-focus:ring-red-300 dark:peer-focus:ring-green-800 dark:peer-checked:peer-focus:ring-red-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                                        <span
                                            class="ms-3 text-sm font-medium flex justify-between items-center peer-checked:text-red-600 dark:peer-checked:text-red-500 text-gray-500 transition">
                                            Private
                                            <svg class="w-6 h-6 ms-2" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-gray-50 dark:bg-gray-700 px-4 py-2 space-x-3 flex justify-start items-center flex-row-reverse">
                    <button type="button" id="create-group" @click="clickedCreate(groupName, groupUsername, groupType)"
                            class="mx-2 focus:outline-none text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-900 transition">
                        Create
                    </button>
                    <button @click="showCreateGroupModal = false" type="button"
                            class="mx-2 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 transition">
                        Close
                    </button>
                </div>
                <script>
                    function clickedCreate(name, username, type) {
                        const data = {
                            name: name,
                            username: username,
                            type: (type == false || type == 0 ? 'public' : 'private')
                        };

                        fetch('{{ route('create.group') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(data)
                        })
                            .then(response => {
                                if (!response.ok) {
                                    return {errors: JSON.parse(response.headers.get('errors'))};
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data && data.errors) {
                                    displayErrors(data.errors);
                                } else {
                                    // Handle success response
                                    if (data) {
                                        fetchData('{{ route('get.sidebar') }}', 'POST', {}).then(response => {
                                            if (response && response.view) {
                                                document.getElementById('static-sidebar-el').innerHTML = response.view;
                                                document.getElementById('responsive-sidebar-el').innerHTML = response.view;
                                            }
                                        });
                                    }
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }

                    function displayErrors(errors) {
                        const errorContainer = document.getElementById('error-container');
                        errorContainer.innerHTML = '';

                        let errorMessages = '';
                        for (const field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                errors[field].forEach(errorMessage => {
                                    errorMessages += errorMessage + '\n\n'
                                });
                            }
                        }
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
                            text: errorMessages
                        });
                    }

                    function fetchData(url, method, data) {
                        return fetch(url, {
                            method: method,
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(data),
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .catch(error => {
                                throw error;
                            });
                    }
                </script>
            </div>
        </div>
    </div>
</div>
