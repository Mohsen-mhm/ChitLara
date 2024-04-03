<div class="w-full flex flex-col">
    @if(session()->has('active_box'))

        <x-chat-nav/>

        <div class="w-full">
            <div class="overflow-auto h-[550px] mb-3" id="overflowed-active-box">
                @if(collect(session('active_box'))->get('type') == \App\Models\Chit::TYPE_SAVED)
                    <div class="w-full h-full" id="saved-message-box">
                        @if(auth()->user()->saveMessage->chits->count())
                            @foreach(auth()->user()->saveMessage->chits as $message)
                                <x-user-message :$message/>
                            @endforeach
                        @else
                            <x-no-message/>
                        @endif
                    </div>
                @elseif(collect(session('active_box'))->get('type') == \App\Models\Chit::TYPE_GROUP)
                    @php
                        $group = \App\Models\Group::getByUuid(collect(session('active_box'))->get('id'));
                    @endphp
                @else
                    @php
                        $user = \App\Models\User::getByUuid(collect(session('active_box'))->get('id'));
                    @endphp
                @endif
            </div>
            {{--                --}}{{-- Active group bubbles --}}
            {{--                <x-group-message/>--}}
            {{--                <x-user-message/>--}}
            {{--                --}}{{-- End active group bubbles --}}

            {{--                --}}{{-- Active private chat bubbles --}}
            {{--                <x-other-message/>--}}
            {{--                <x-user-message/>--}}
            {{--                --}}{{-- End active private chat bubbles --}}

            <div class="w-full h-full" id="send-form-component">
                <x-send-form/>
            </div>
        </div>
    @else
        <x-no-message/>
    @endif
</div>
