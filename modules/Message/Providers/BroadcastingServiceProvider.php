<?php
namespace Modules\Message\Providers;

use Illuminate\Support\ServiceProvider;

class BroadcastingServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    $this->loadRoutesFrom(__DIR__ . '/../Routes/channels.php');
  }
}