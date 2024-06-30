<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Guild;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ChannelController extends Controller
{

    public function index(Guild $guild, Channel $channel, int $guild_id): View
    {

        $guilds = $guild->all();

        $channels = $channel->all();

        return view(
            'discord.index',
            [
                'guild_id' => $guild_id,
                'guilds' => $guilds,
                'channels' => $channels
            ]
        );
    }

    public function store(Request $request, Channel $channel)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'guild_id' => ['required', 'exists:guilds, id', 'string']
        ]);

        $channel->create($request->all());

        return redirect()->route('guilds.show', ['guild_id' => $request->guild_id]);
    }

}
