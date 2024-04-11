<?php

namespace Coufal\LaravelHttpScheduleTrigger\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Artisan;
use Log;

class ScheduledTaskController extends BaseController
{
  public function run(Request $request)
  {
    $exitCode = Artisan::call('schedule:run');

    if ($exitCode !== 0) {
      // Log error if schedule:run was not successful
      Log::error('Scheduled tasks execution failed with exit code: ' . $exitCode);
      return response()->json(['message' => 'Scheduled tasks execution failed.'], 500);
    }

    return response()->json(['message' => 'Scheduled tasks executed successfully.']);
  }
}