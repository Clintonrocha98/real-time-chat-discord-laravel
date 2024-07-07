<?php

namespace Modules\Channel\Service;

use Modules\Channel\Model\Channel;
use Modules\Channel\Repository\Eloquent\ChannelRepository;

class ChannelService
{

  public function __construct(private ChannelRepository $channelRepository)
  {

  }


  public function channels(string $guild_id): array
  {
    return $this->channelRepository->channels($guild_id);
  }
  public function create(array $data): Channel
  {
    return $this->channelRepository->create($data);
  }
  public function delete(string $channel_id): void
  {
    $this->channelRepository->delete($channel_id);
  }

}