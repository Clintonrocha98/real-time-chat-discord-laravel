<?php

namespace Modules\Channel\Repository\Eloquent;

use Modules\Channel\Contract\ChannelContract;
use Modules\Channel\Model\Channel;

class ChannelRepository implements ChannelContract
{

  public function channels(string $guild_id): array
  {
    return Channel::where('guild_id', $guild_id)->get()->all();
  }

  public function create(array $data): Channel
  {
    $channel = Channel::create($data);

    return $channel;
  }

  public function delete(string $channel_id): void
  {
    Channel::where("id", $channel_id)->delete();
  }

}