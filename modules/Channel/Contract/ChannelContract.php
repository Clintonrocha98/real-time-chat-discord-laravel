<?php

namespace Modules\Channel\Contract;

use Modules\Channel\Model\Channel;

interface ChannelContract
{
  public function channels(string $guild_id): array;
  public function create(array $data): Channel;
  public function delete(string $channel_id): void;
}