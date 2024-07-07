<?php

namespace Modules\Guild\Contract;

use Modules\Guild\Model\Guild;
use Illuminate\Database\Eloquent\Collection;
interface GuildContract
{
  public function guilds(): Collection;
  public function create(array $data): Guild;
  public function delete(string $owner_id, string $guild_id): void;
}