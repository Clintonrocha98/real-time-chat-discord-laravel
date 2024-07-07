<?php

namespace Modules\Guild\Repository\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Modules\Guild\Contract\GuildContract;
use Modules\Guild\Model\Guild;

class GuildRepository implements GuildContract
{
  public function guilds(): Collection
  {
    return Guild::all();
  }
  public function create(array $data): Guild
  {
    $guild = Guild::create($data);

    return $guild;
  }
  public function delete(string $owner_id, string $guild_id): void
  {
    Guild::where('owner_id', $owner_id)
      ->where('id', $guild_id)
      ->first()
      ->delete();
  }
}