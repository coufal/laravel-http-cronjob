<?php

namespace Coufal\LaravelHttpCronjob\Providers;

use Illuminate\Support\ServiceProvider;

class HttpCronjobServiceProvider extends ServiceProvider
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
      __DIR__ . '/../../config/http-cronjob.php', 'http-cronjob'
    );

    // Publish configuration
    $this->publishes([
      __DIR__ . '/../../config/http-cronjob.php' => config_path('http-cronjob.php'),
    ]);
  }
}
