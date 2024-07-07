<?php

namespace Modules\Channel\Http\Controller;

use App\Http\Controllers\Controller;
use Modules\Channel\Service\ChannelService;
use Modules\Channel\Http\Requests\CreateChannelRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Guild\Model\Guild;


class ChannelController extends Controller
{
    function __construct(private readonly ChannelService $channelService)
    {
    }

    public function getChannels(string $guild_id): View
    {
        $channels = $this->channelService->channels($guild_id);

        $guilds = Guild::all();

        return view(
            'discord.index',
            [
                'channels' => $channels,
                'guilds' => $guilds,
                'guild_id' => $guild_id
            ]
        );
    }

    public function postChannel(CreateChannelRequest $request, int $guild_id): RedirectResponse
    {
        $attributes = $request->validated();

        $this->channelService->create($attributes);

        return redirect()->route("channels.show", ['guild_id' => $guild_id]);
    }

    public function deleteChannel(string $channel_id): RedirectResponse
    {
        $this->channelService->delete($channel_id);

        return redirect('/guilds');
    }

}
