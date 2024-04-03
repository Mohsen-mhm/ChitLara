<div class="h-full overflow-auto pr-2">
    @if($user->saveMessage->count())
        <a href="javascript:void(0)"
           @if(collect(session('active_box'))->get('id') != $user->saveMessage->uuid) onclick="clickOnChat('{{ $user->saveMessage->uuid }}', '{{ \App\Models\Chit::TYPE_SAVED }}')"
           @endif
           class="flex items-start hover:-translate-x-0.5 @if(collect(session('active_box'))->get('id') == $user->saveMessage->uuid) bg-indigo-700 hover:bg-indigo-800 @endif transition p-2 mb-2 rounded-lg gap-2.5 cursor-pointer">
            <div style="min-height: 2.5rem; min-width: 2.5rem;"
                 class="rounded-full h-10 w-10 min-h-10 min-w-10 flex items-center justify-center text-white text-xl font-bold bg-blue-500">
                <svg class="w-6 h-6 text-white dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z"/>
                </svg>
            </div>
            <div class="relative flex flex-col w-full max-w-[250px] leading-1.5">
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span
                        class="text-sm font-semibold text-yellow-500 dark:text-yellow-400">{{ __('title.save_message') }}</span>
                </div>
                <p class="text-sm font-normal transition dark:text-white @if(collect(session('active_box'))->get('type') == \App\Models\Chit::TYPE_SAVED) text-white @endif">
                    @if($user->saveMessage->chits->count())
                        {{ \Illuminate\Support\Str::limit(nl2br(str_replace(["\r\n", "\r", "\n"], '<br>', urldecode($user->saveMessage->chits->last()->message))), 13) }}
                    @else
                        ...
                    @endif
                </p>
                @if($user->saveMessage->chits->count())
                    <span class="absolute bottom-0 right-0 text-sm font-normal text-gray-400 dark:text-gray-200">
                        {{ $user->saveMessage->chits->last()->getMessageSendAt() }}
                    </span>
                @endif
            </div>
        </a>
    @endif

    <script>
        function clickOnChat(uuid, type) {
            fetchData('/click-chat', 'POST', {id: uuid, type: type}).then(response => {
                if (response && response.view) {
                    document.getElementById('active-box-el').innerHTML = response.view;
                    attachEventListeners();
                    let activeBox = document.getElementById('overflowed-active-box');
                    if (activeBox) {
                        smoothScrollToBottom(activeBox, 500);
                    }
                }
            });
            fetchData('/get-sidebar-view', 'POST', {}).then(response => {
                if (response && response.view) {
                    document.getElementById('static-sidebar-el').innerHTML = response.view;
                    document.getElementById('responsive-sidebar-el').innerHTML = response.view;
                }
            });
        }

        function attachEventListeners() {
            let images = document.getElementsByClassName('attached-image');

            for (let i = 0; i < images.length; i++) {
                let image = images[i];

                let uuid = image.dataset.uuid;
                image.addEventListener('error', () => {
                    let placeholderSrc = '{{ asset('assets/img/image-placeholder.png') }}';
                    let span = document.getElementById('span-' + uuid);

                    image.src = placeholderSrc;
                    image.classList.add('w-1/2');
                    span.classList.remove('hidden');
                });
                image.addEventListener('load', () => {
                    let skeleton = document.getElementById('skeleton-' + uuid);
                    skeleton.classList.add('hidden');
                });
            }
            document.getElementById('send-message').addEventListener('click', function () {
                let message = encodeURIComponent(document.getElementById('message-input').value)
                fetchData('{{ route('message.sent') }}', 'POST', {message: message}).then((response) => {
                    let activeBox = document.getElementById('overflowed-active-box');
                    if (activeBox) {
                        smoothScrollToBottom(activeBox, 500);
                    }
                })
            })
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
                        return null;
                    }
                    return response.json();
                })
                .then(data => {
                    return data;
                })
                .catch((error) => {
                    return null;
                });
        }
    </script>
</div>
