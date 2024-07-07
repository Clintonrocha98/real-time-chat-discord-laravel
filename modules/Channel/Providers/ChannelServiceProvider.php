<?php

namespace Modules\Channel\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Channel\Contract\ChannelContract;
use Modules\Channel\Repository\Eloquent\ChannelRepository;

class ChannelServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
    
    $this->app->bind(ChannelContract::class, ChannelRepository::class);
  }
}