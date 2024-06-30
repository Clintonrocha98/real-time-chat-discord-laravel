<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\SendMessage;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class PostMessageController extends Controller
{
  public function postMessage(Request $request, Message $message)
  {
    $newMessage = $message->create(
      [
        'content' => $request->input('content'),
        'channel_id' => $request->input('channel_id'),
        'user_id' => Auth::id()
      ]
    );

    SendMessage::dispatch($newMessage);

    return response()->json($newMessage, 201);
  }
}