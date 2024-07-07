<?php

namespace Modules\Message\Service;

use Modules\Message\Model\Message;
use Modules\Message\Repository\Eloquent\MessageRepository;

class MessageService
{

  public function __construct(private readonly MessageRepository $messageRepository)
  {
  }

  public function getMessages(int $channel_id)
  {
    return $this->messageRepository->messages($channel_id);
  }

  public function create(array $data): Message
  {
    $message = $this->messageRepository->create($data);

    return $message;
  }
}