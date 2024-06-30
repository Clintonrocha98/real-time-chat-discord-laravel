@props(['action', 'channel_id', 'guild_id'])

<form method='POST' action='{{ $action }}' id='messageForm'>
    @csrf
    @method('POST')
    <div class="pb-6 px-4 flex-none">
        <div class="flex rounded-lg overflow-hidden">
            <span class="text-3xl text-grey border-r-4 border-gray-600 bg-gray-600 p-2">
                <svg class="h-6 w-6 block bg-gray-500 hover:bg-gray-400 cursor-pointer rounded-xl"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"
                        fill="#FFFFFF" />
                </svg>
            </span>
            <input type="hidden" id="channelId" value='{{ $channel_id }}' />
            <input type="hidden" id="guildId" value='{{ $guild_id }}' />
            <input name='content' id="content" type="text" class="w-full px-4 bg-gray-600  outline-none text-white"
                placeholder="Message" autocomplete="off" />
        </div>
    </div>

</form>
