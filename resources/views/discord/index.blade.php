<x-wrapper>
    <x-sidebar.wrapper>
        @foreach ($guilds as $guild)
            <x-sidebar.link-guild href="/guilds/{{ $guild->id }}"
                isCurrent="{{ $guild->id == request()->segment(2) }}" />
        @endforeach

        <x-sidebar.button-create-guild onclick="openModal('createGuild')" />

        <x-modal id='createGuild'>
            <h2 class="text-2xl font-bold mb-4">Create a new guild</h2>
            <x-form.form id="editForm" action="{{ route('guild.store') }}" method="POST">
                <x-form.label for='name'>Guild Name:</x-form.label>
                <x-form.input name='name' />

                <x-form.input type='hidden' name='owner_id' value='{{ auth()->user()->id }}' />

                <div class="space-y-2">
                    <x-form.button class="mt-2">Create Guild</x-form.button>
                    <x-form.button type='button' onclick="closeModal('createGuild')">Cancel</x-form.button>
                </div>
            </x-form.form>
        </x-modal>

        <x-form.form action="{{ route('logout') }}" class="mt-auto pb-5">
            <button type="submit" title='logout'>
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#000"
                    version="1.1" viewBox="0 0 471.2 471.2" xmlSpace="preserve">
                    <path
                        d="M227.619 444.2h-122.9c-33.4 0-60.5-27.2-60.5-60.5V87.5c0-33.4 27.2-60.5 60.5-60.5h124.9c7.5 0 13.5-6 13.5-13.5s-6-13.5-13.5-13.5h-124.9c-48.3 0-87.5 39.3-87.5 87.5v296.2c0 48.3 39.3 87.5 87.5 87.5h122.9c7.5 0 13.5-6 13.5-13.5s-6.1-13.5-13.5-13.5z">
                    </path>
                    <path
                        d="M450.019 226.1l-85.8-85.8c-5.3-5.3-13.8-5.3-19.1 0-5.3 5.3-5.3 13.8 0 19.1l62.8 62.8h-273.9c-7.5 0-13.5 6-13.5 13.5s6 13.5 13.5 13.5h273.9l-62.8 62.8c-5.3 5.3-5.3 13.8 0 19.1 2.6 2.6 6.1 4 9.5 4s6.9-1.3 9.5-4l85.8-85.8c5.4-5.4 5.4-14 .1-19.2z">
                    </path>
                </svg>
            </button>
        </x-form.form>

    </x-sidebar.wrapper>


    {{-- channels --}}
    <x-channel.wrapper>
        <x-channel.title>
            @isset($guild_id)
                {{ $guilds->find($guild_id)->name }}

                @if ($guilds->find($guild_id)->owner->id === Auth::id())
                    <x-slot:del>
                        <x-delete-button action="/guilds/{{ $guild_id }}" />
                    </x-slot:del>
                @endif
            @endisset
        </x-channel.title>

        @isset($guild_id)
            <x-modal id='createChannel'>
                <h2 class="text-2xl font-bold mb-4">Create a new channel</h2>

                <x-form.form id="editForm" action="{{ route('channel.store', ['guild_id' => $guild_id]) }}" method="POST">
                    <x-form.label for='name'>Channel Name:</x-form.label>
                    <x-form.input name='name' />
                    <x-form.input name='guild_id' type='hidden' value='{{ $guild_id }}' />
                    <div class="space-y-2">
                        <x-form.button class="mt-2">Create</x-form.button>
                        <x-form.button type='button' onclick="closeModal('createChannel')">Cancel</x-form.button>
                    </div>
                </x-form.form>
            </x-modal>
        @endisset

        @isset($channels)
            <x-channel.wrapper-channels>
                @foreach ($channels as $channel)
                    <x-channel.link href="/guilds/{{ $guild_id }}/channels/{{ $channel->id }}"
                        isCurrent="{{ $channel->id == request()->segment(4) }}">

                        # {{ $channel->name }}

                        @if ($guilds->find($guild_id)->owner->id === Auth::id())
                            <x-delete-button action="/guilds/{{ $guild_id }}/{{ $channel->id }}" />
                        @endif

                    </x-channel.link>
                @endforeach
            </x-channel.wrapper-channels>
        @endisset
    </x-channel.wrapper>

    {{-- messages --}}
    <div class="flex-1 flex flex-col bg-gray-700">
        @isset($channel_id)
            <x-chat.header>{{ $channels->find($channel_id)->name }}</x-chat.header>
        @endisset
        <div class="overflow-hidden flex h-full">
            <div class="px-6 py-4 flex-1 overflow-y-scroll scrollbar-thin" id='chatMenssages'>
                @isset($messages)
                    @foreach ($messages as $message)
                        <x-chat.message name='{{ $message->user->name }}' content='{{ $message->content }}'
                            time="{{ $message->created_at->format('d-m-Y H:i:s') }}" />
                    @endforeach
                @endisset

                @empty($channel_id)
                    <x-presentation />
                @endempty
            </div>

            @isset($messages)
                <x-members />
            @endisset

        </div>

        @isset($channel_id)
            <x-chat.input channel_id='{{ $channel_id }}' guild_id='{{ $guild_id }}'
                user_id='{{ auth()->user()->id }}' />
        @endisset
    </div>


</x-wrapper>
