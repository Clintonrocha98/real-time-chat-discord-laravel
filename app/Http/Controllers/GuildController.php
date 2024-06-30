<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GuildController extends Controller
{
    public function index(): View
    {
        $guilds = Guild::all();

        return view('discord.index', ['guilds' => $guilds]);
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->all();

        $attributes = array_merge($attributes, ['owner_id' => Auth::id()]);

        Guild::create($attributes);

        return redirect('/guilds');
    }

    public function destroy(Guild $guild): RedirectResponse
    {

        Guild::where('id', $guild->id)
            ->where('owner_id', Auth::id())
            ->first()
            ->delete();

        return redirect('/guilds');
    }

}
