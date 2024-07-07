<?php

namespace Modules\Guild\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Guild\Contract\GuildContract;
use Modules\Guild\Repository\Eloquent\GuildRepository;

class GuildServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

    $this->app->bind(GuildContract::class, GuildRepository::class);
  }
}