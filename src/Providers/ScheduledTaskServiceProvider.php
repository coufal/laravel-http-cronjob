<?php

namespace Coufal\LaravelHttpScheduleTrigger\Providers;

use Illuminate\Support\ServiceProvider;

class ScheduledTaskServiceProvider extends ServiceProvider
{
  public function boot()
  {
    // Routen laden
    $this->loadRoutesFrom(__DIR__.'/../routes.php');

    // Register Middleware
    $router = $this->app['router'];
    $router->aliasMiddleware('authenticate.scheduled.request', Http\Middleware\AuthenticateScheduledRequest::class);
  }

  public function register()
  {
    $this->mergeConfigFrom(
      __DIR__.'/../../config/scheduled-tasks.php', 'scheduled-tasks'
    );

    // Publish configuration
    $this->publishes([
      __DIR__.'/../../config/scheduled-tasks.php' => config_path('scheduled-tasks.php'),
    ]);
  }
}
