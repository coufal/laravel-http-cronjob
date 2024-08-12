<?php

use Coufal\LaravelHttpCronjob\Http\Controllers\ScheduledTaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['Coufal\LaravelHttpCronjob\Http\Middleware\AuthenticateHttpCronjobRequest'])->group(function () {
    Route::post(config('http-cronjob.endpoint'), [ScheduledTaskController::class, 'run']);
    Route::get(config('http-cronjob.endpoint'), [ScheduledTaskController::class, 'run']);
});
