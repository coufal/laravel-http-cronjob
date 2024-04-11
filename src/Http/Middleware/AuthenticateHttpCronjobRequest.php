<?php

namespace Coufal\LaravelHttpCronjob\Http\Middleware;

use Closure;

class AuthenticateHttpCronjobRequest
{
  public function handle($request, Closure $next)
  {
    $expectedToken = config('http-cronjob.token');

    // Checks whether a token is set and whether the Authorization header contains the expected token.
    if (empty($expectedToken) || $request->header('Authorization') !== 'Bearer ' . $expectedToken) {
      // Unauthorized access, return 401
      return response('Unauthorized', 401);
    }

    return $next($request);
  }
}
