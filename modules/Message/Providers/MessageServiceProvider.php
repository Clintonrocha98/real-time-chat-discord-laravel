<?php
namespace Modules\Message\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Message\Contract\MessageContract;
use Modules\Message\Repository\Eloquent\MessageRepository;

class MessageServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

    $this->app->bind(MessageContract::class, MessageRepository::class);
  }
}