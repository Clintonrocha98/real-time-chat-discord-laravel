<?php

namespace Modules\Message\Http\Controller;

use Illuminate\View\View;
use Modules\Channel\Model\Channel;
use Modules\Guild\Model\Guild;
use App\Http\Controllers\Controller;
use Modules\Message\Service\MessageService;
use Modules\Message\Http\Requests\CreateMessageRequest;
use Modules\Message\Events\SendMessage;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public function __construct(private readonly MessageService $messageService)
    {

    }
    public function getMessages(int $guild_id, int $channel_id): View
    {
        $messages = $this->messageService->getMessages($channel_id);
        $guilds = Guild::all();
        $channels = Channel::where('guild_id', $guild_id)->get();

        return view(
            'discord.index',
            [
                "guilds" => $guilds,
                "guild_id" => $guild_id,
                "channels" => $channels,
                "channel_id" => $channel_id,
                "messages" => $messages,
            ]
        );
    }
    public function postMessage(CreateMessageRequest $request): JsonResponse
    {
        $attributes = $request->validated();

        $message = $this->messageService->create($attributes);

        SendMessage::dispatch($message);

        return response()->json($message, 201);
    }

}
