<div class="w-full flex flex-col">
    @if(session()->has('active_box'))

        <x-chat-nav/>

        <div class="w-full">
            <div class="overflow-auto h-[550px]">
                {{-- Active group bubbles --}}
                <x-group-message/>
                <x-user-message/>
                {{-- End active group bubbles --}}

                {{-- Active private chat bubbles --}}
                <x-other-message/>
                <x-user-message/>
                {{-- End active private chat bubbles --}}


            </div>

            <x-send-form/>
        </div>
    @else
        <x-no-message/>
    @endif
</div>
