<?php

namespace Modules\Guild\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\Guild\Http\Requests\CreateGuildRequest;
use Modules\Guild\Service\GuildService;

class GuildController extends Controller
{
    public function __construct(private readonly GuildService $guildService)
    {

    }
    public function getGuilds(): View
    {
        $guilds = $this->guildService->all();

        return view('discord.index', ['guilds' => $guilds]);
    }

    public function postGuild(CreateGuildRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $this->guildService->create($attributes);

        return redirect('/guilds');
    }

    public function deleteGuild(int $guild_id): RedirectResponse
    {
        $this->guildService->delete($guild_id, Auth::id());

        return redirect('/guilds');
    }

}
