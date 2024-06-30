<x-wrapper>
    <!-- channel list -->
    <x-sidebar.wrapper>
        @foreach ($guilds as $guild)
            <x-sidebar.link-guild href='/guilds/{{ $guild->id }}' />
        @endforeach
        <x-sidebar.button-create-guild onclick="openModal('createGuild')" />
        <!-- modal create guild-->
        <x-modal id='createGuild'>
            <h2 class="text-2xl font-bold mb-4">Create a new guild</h2>
            <x-form.form id="editForm" action="/guilds" method="POST">
                <x-form.label for='name'>Guild Name:</x-form.label>
                <x-form.input name='name' />

                <div class="space-y-2">
                    <x-form.button class="mt-2">Create Guild</x-form.button>
                    <x-form.button type='button' onclick="closeModal('createGuild')">Cancel</x-form.button>
                </div>
            </x-form.form>
        </x-modal>
    </x-sidebar.wrapper>
    {{-- channel list --}}
    <x-channel.wrapper>
        <x-channel.title>
            @isset($guild_id)
                {{ $guilds->find($guild_id)->name }}
            @endisset

            @empty($guild_id)
                select a guild
            @endempty
        </x-channel.title>

        <!-- modal create channel -->
        @isset($guild_id)
            <x-modal id='createChannel'>
                <h2 class="text-2xl font-bold mb-4">Create a new channel</h2>

                <x-form.form id="editForm" action="/guilds/{{ $guild_id }}/channels" method="POST">
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
        <x-channel.wrapper-channels>
            @isset($channels)
                @foreach ($channels as $channel)
                    <x-channel.link href='/guilds/{{ $guild_id }}/channels/{{ $channel->id }}'>
                        # {{ $channel->name }}
                    </x-channel.link>
                @endforeach
            @endisset
        </x-channel.wrapper-channels>
    </x-channel.wrapper>

    <x-chat.wrapper>
        @isset($channel_id)
            <x-chat.header>{{ $channels->find($channel_id)->name }}</x-chat.header>
        @endisset

        <x-chat.body>
            {{-- Chat messages --}}

            @isset($messages)
                @foreach ($messages as $message)
                    <x-chat.message name='{{ $message->user->name }}' content='{{ $message->content }}'
                        time="{{ $message->created_at->format('H:i:s') }}" />
                @endforeach
            @endisset
        </x-chat.body>
        {{-- input --}}
        @isset($channel_id)
            <x-chat.input action='/guilds/{{ $guild_id }}/channels/{{ $channel_id }}/message'
                channel_id='{{ $channel_id }}' guild_id='{{ $guild_id }}' />
        @endisset
    </x-chat.wrapper>
</x-wrapper>
