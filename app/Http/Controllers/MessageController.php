<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Guild;

class MessageController extends Controller
{
    public function getMessages(Guild $guild, Channel $channel, int $guild_id, int $channel_id)
    {

        $guilds = $guild->all();

        $channels = $channel->all();

        $messages = $channel->find($channel_id)->messages;

        return view(
            'discord.index',
            [
                'guild_id' => $guild_id,
                'guilds' => $guilds,
                'channel_id' => $channel_id,
                'channels' => $channels,
                'messages' => $messages,
            ]
        );
    }
}
