@if($message->attachment)
    <div class="flex items-start my-2 px-1" dir="rtl">
        <div
            class="relative group flex flex-col w-5/6 max-w-[400px] leading-1.5 transition px-0.5 border-gray-200 bg-indigo-700 hover:bg-indigo-800 dark:hover:bg-indigo-800 rounded-xl rounded-es-none">
            @if($message->attachment->getType() == \App\Models\MessageAttachment::TYPE_IMAGE)
                <div class="flex flex-col justify-center items-center text-center">
                    <img src="{{ asset('storage/' . $message->attachment->path . '/' . $message->attachment->name) }}"
                         alt="Attachment" id="image-{{ $message->uuid }}" data-uuid="{{ $message->uuid }}"
                         class="attached-image transition my-0.5 rounded-xl group-hover:filter group-hover:brightness-125">
                    <span id="span-{{ $message->uuid }}"
                          class="hidden mb-2 text-sm font-semibold text-yellow-400 font-mono">{{ __('title.fail_to_load') }}</span>
                </div>

            @elseif($message->attachment->getType() == \App\Models\MessageAttachment::TYPE_FILE)
                <div
                    class="flex justify-between items-center transition select-none bg-transparent border border-gray-400 hover:bg-indigo-900 h-[70px] rounded-xl px-4 m-1 mb-6"
                    dir="ltr">
                        <span
                            class="flex justify-center items-center gap-2 text-sm font-mono text-white">
                              <svg class="w-8 h-8 text-yellow-400" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="none"
                                   viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 3v4a1 1 0 0 1-1 1H5m4 6 2 2 4-4m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                              </svg>
                              {{ \Illuminate\Support\Str::limit($message->attachment->name, 15) }}
                        </span>
                    <button
                        class="text-sm text-center transition rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="w-8 h-8 m-1 text-yellow-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                        </svg>
                    </button>
                    {{--                        {{ asset(\App\Models\MessageAttachment::ATTACHMENT_DIR . $message->attachment->url) }}--}}
                </div>
            @endif
            @if($message->message)
                <p dir="ltr" class="text-base font-mono font-bold p-2 mb-5 text-white dark:text-gray-100">
                    {!! nl2br(str_replace(["\r\n", "\r", "\n"], '<br>', urldecode($message->message))) !!}
                </p>
            @endif
            <span
                class="absolute bottom-1 right-2 text-sm font-normal text-gray-50 dark:text-gray-200">{{ $message->getMessageSendAt() }}</span>
        </div>
    </div>
    <script>
        document.getElementById('image-{{ $message->uuid }}').addEventListener('error', () => {
            let image = document.getElementById('image-{{ $message->uuid }}');
            let span = document.getElementById('span-{{ $message->uuid }}');

            span.classList.remove('hidden');
            image.src = '{{ asset('assets/img/image-placeholder.png') }}';
            image.classList.add('w-1/2');
        });
    </script>
@else
    <div class="flex items-start my-2 px-1" dir="rtl">
        <div
            class="relative flex flex-col w-5/6 max-w-[400px] leading-1.5 transition px-4 border-gray-200 bg-indigo-700 hover:bg-indigo-800 dark:hover:bg-indigo-800 rounded-xl rounded-es-none">

            @if($message->message)
                <p dir="ltr" class="text-base font-mono font-bold py-2 mb-5 text-white dark:text-gray-100">
                    {!! nl2br(str_replace(["\r\n", "\r", "\n"], '<br>', urldecode($message->message))) !!}
                </p>
            @endif

            <span
                class="absolute bottom-1 right-2 text-sm font-normal text-gray-50 dark:text-gray-200">{{ $message->getMessageSendAt() }}</span>
        </div>
    </div>
@endif

