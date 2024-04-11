<?php

use Illuminate\Support\Facades\Route;
use Coufal\LaravelHttpScheduleTrigger\Http\Controllers\ScheduledTaskController;

Route::middleware(['Coufal\LaravelHttpScheduleTrigger\Http\Middleware\AuthenticateScheduledRequest'])->group(function () {
  Route::post('/scheduler/cronjob', [ScheduledTaskController::class, 'run']);
});