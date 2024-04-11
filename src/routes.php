<?php

use Illuminate\Support\Facades\Route;
use Coufal\LaravelHttpCronjob\Http\Controllers\ScheduledTaskController;

Route::middleware(['Coufal\LaravelHttpCronjob\Http\Middleware\AuthenticateHttpCronjobRequest'])->group(function () {
  Route::post(config('http-cronjob.endpoint'), [ScheduledTaskController::class, 'run']);
});