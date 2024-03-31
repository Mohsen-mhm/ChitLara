<div
    class="flex justify-start items-center border-b border-gray-500 dark:border-gray-600 pb-2 mb-2 transition">
    @if(session()->has('active_box'))
        @if(collect(session('active_box'))->get('type') == \App\Models\Chit::TYPE_SAVED)
            <div style="min-height: 3rem; min-width: 3rem;"
                 class="rounded-full h-10 w-10 min-h-10 ml-[3.8rem] lg:m-0 min-w-10 flex items-center justify-center text-white text-xl font-bold bg-blue-500">
                <svg class="w-8 h-8 text-white dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z"/>
                </svg>
            </div>
            <div class="flex flex-col justify-center items-start ml-3">
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white transition">{{ __('title.save_message') }}</h1>
            </div>
        @elseif(collect(session('active_box'))->get('type') == \App\Models\Chit::TYPE_GROUP)
            @php
                $group = \App\Models\Group::getByUuid(collect(session('active_box'))->get('id'));
            @endphp
            {!! \App\Helper\Helper::generateAvatar($group->username, $group->avatar) !!}
            <div class="flex flex-col justify-center items-start ml-4">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-white transition">{{ $group->name }}</h1>
                <h1 class="text-sm text-gray-700 dark:text-gray-400 transition">{{ $group->users->count() }} {{ __('title.member') }}</h1>
            </div>
        @else
            @php
                $user = \App\Models\User::getByUuid(collect(session('active_box'))->get('id'));
            @endphp
            {!! \App\Helper\Helper::generateAvatar($user->username, $user->avatar) !!}
            <div class="flex flex-col justify-center items-start ml-4">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-white transition">{{ $user->name }}</h1>
                <h1 class="text-sm text-gray-700 dark:text-gray-400 transition">{{ __('title.last_seen') }} {{ $user->users->getUserLastSeen() }}</h1>
            </div>
        @endif
    @endif
</div>
