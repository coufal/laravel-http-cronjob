<?php

namespace Coufal\LaravelHttpCronjob\Http\Middleware;

use Closure;

class AuthenticateHttpCronjobRequest
{
    public function handle($request, Closure $next)
    {
        $expectedToken = config('http-cronjob.token');

        if (empty($expectedToken)) {
            return response('Unauthorized - Please define a token via HTTP_CRONJOB_TOKEN in your .env file', 401);
        }

        // Determine the token based on the request method
        if ($request->isMethod('post')) {
            // Check for Bearer token in Authorization header
            $token = $request->bearerToken();
            $tokenValid = $token === $expectedToken;
        } elseif ($request->isMethod('get')) {
            // Check for token in the query string
            $token = $request->query('token');
            $tokenValid = $token === $expectedToken;
        } else {
            // If not GET or POST, automatically reject
            return response('Method not allowed', 405);
        }

        // Validate the token
        if (! $tokenValid) {
            // Unauthorized access, return 401
            return response('Unauthorized', 401);
        }

        return $next($request);
    }
}
