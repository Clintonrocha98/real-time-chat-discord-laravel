<?php

namespace Modules\Message\Contract;

use Modules\Message\Model\Message;

interface MessageContract
{
  public function messages(string $channel_id): array;
  public function create(array $data): Message;
}