<?php

namespace Modules\Guild\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Guild\Model\Guild;
use Modules\Guild\Repository\Eloquent\GuildRepository;


class GuildService
{
  public function __construct(private readonly GuildRepository $guildRepository)
  {

  }

  public function all(): Collection
  {
    return $this->guildRepository->guilds();
  }
  public function create(array $data): Guild
  {
    return $this->guildRepository->create($data);
  }
  public function delete(string $guild_id, string $owner_id): void
  {
    $this->guildRepository->delete($owner_id, $guild_id);
  }

}