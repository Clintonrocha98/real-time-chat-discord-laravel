<?php

namespace Modules\Channel\Service;

use Modules\Channel\Repository\Eloquent\ChannelRepository;

class ChannelService
{

  public function __construct(private ChannelRepository $channelRepository)
  {

  }


  public function channels(string $guild_id)
  {
    return $this->channelRepository->channels($guild_id);
  }
  public function create(array $data)
  {
    return $this->channelRepository->create($data);
  }
  public function delete(string $channel_id)
  {
    $this->channelRepository->delete($channel_id);
  }

}