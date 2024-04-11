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
    $router->aliasMiddleware('authenticate.http_cronjob.request', Http\Middleware\AuthenticateScheduledRequest::class);
  }

  public function register()
  {
    $this->mergeConfigFrom(
      __DIR__ . '/../../config/http-schedule-trigger.php', 'http-schedule-trigger'
    );

    // Publish configuration
    $this->publishes([
      __DIR__ . '/../../config/http-schedule-trigger.php' => config_path('http-schedule-trigger.php'),
    ]);
  }
}
