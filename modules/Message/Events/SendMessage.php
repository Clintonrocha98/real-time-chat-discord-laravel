<?php

namespace Modules\Message\Events;

use Modules\Message\Model\Message;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public readonly Message $message)
    {

    }

    public function broadcastOn()
    {
        return new PrivateChannel('room.' . $this->message->channel_id);
    }
    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->id,
            'content' => $this->message->content,
            'user' => [
                'id' => $this->message->user->id,
                'name' => $this->message->user->name,
            ],
            'send_at' => $this->message->created_at->format('d-m-Y H:i:s'),
        ];
    }
    public function broadcastAs(): string
    {
        return 'newMessage';
    }
}
