<?php

namespace Coufal\LaravelHttpScheduleTrigger\Http\Middleware;

use Closure;

class AuthenticateScheduledRequest
{
  public function handle($request, Closure $next)
  {
    $expectedToken = env('SCHEDULED_TASKS_TOKEN');

    // Checks whether a token is set and whether the Authorization header contains the expected token.
    if (empty($expectedToken) || $request->header('Authorization') !== 'Bearer ' . $expectedToken) {
      // Unauthorized access, return 401
      return response('Unauthorized', 401);
    }

    return $next($request);
  }
}
