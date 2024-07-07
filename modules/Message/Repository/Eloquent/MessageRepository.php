<?php

namespace Modules\Message\Repository\Eloquent;

use Modules\Message\Contract\MessageContract;
use Modules\Message\Model\Message;

class MessageRepository implements MessageContract
{
  public function messages(string $channel_id): array
  {
    return Message::where('channel_id', $channel_id)->get()->all();
  }
  public function create(array $data): Message
  {
    return Message::create($data);
  }
}