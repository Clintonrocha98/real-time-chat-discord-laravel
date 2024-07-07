<?php

namespace Modules\Guild\Service;

use Modules\Guild\Repository\Eloquent\GuildRepository;


class GuildService
{
  public function __construct(private readonly GuildRepository $guildRepository)
  {

  }

  public function all()
  {
    return $this->guildRepository->guilds();
  }
  public function create(array $data)
  {
    return $this->guildRepository->create($data);
  }
  public function delete(string $guild_id, string $owner_id)
  {
    $this->guildRepository->delete($owner_id, $guild_id);
  }

}